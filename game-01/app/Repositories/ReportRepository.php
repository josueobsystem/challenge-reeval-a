<?php

namespace App\Repositories;

use App\Interfaces\ReportRepositoryInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ReportRepository implements ReportRepositoryInterface
{
    public function obtenerQueryReporte($inicio = null, $fin = null): Builder
    {
        // Préstamos
        $prestamos = DB::table('report_loans')
            ->join('subscription_reports', 'report_loans.subscription_report_id', '=', 'subscription_reports.id')
            ->join('subscriptions', 'subscription_reports.subscription_id', '=', 'subscriptions.id')
            ->select(
                'subscription_reports.id as report_id',
                'subscriptions.full_name',
                'subscriptions.document',
                'subscriptions.email',
                'subscriptions.phone',
                'report_loans.bank as company',
                DB::raw("'Préstamo' as type"),
                'report_loans.status as status',
                'report_loans.expiration_days as delay',
                'report_loans.bank as entity',
                'report_loans.amount as total_amount',
                DB::raw("NULL as line_total"),
                DB::raw("NULL as line_used"),
                'subscription_reports.created_at as report_date'
            );

        // Otras Deudas
        $otras = DB::table('report_other_debts')
            ->join('subscription_reports', 'report_other_debts.subscription_report_id', '=', 'subscription_reports.id')
            ->join('subscriptions', 'subscription_reports.subscription_id', '=', 'subscriptions.id')
            ->select(
                'subscription_reports.id as report_id',
                'subscriptions.full_name',
                'subscriptions.document',
                'subscriptions.email',
                'subscriptions.phone',
                'report_other_debts.entity as company',
                DB::raw("'Otra deuda' as type"),
                DB::raw("NULL as status"),
                'report_other_debts.expiration_days as delay',
                'report_other_debts.entity as entity',
                'report_other_debts.amount as total_amount',
                DB::raw("NULL as line_total"),
                DB::raw("NULL as line_used"),
                'subscription_reports.created_at as report_date'
            );

        // Tarjetas
        $tarjetas = DB::table('report_credit_cards')
            ->join('subscription_reports', 'report_credit_cards.subscription_report_id', '=', 'subscription_reports.id')
            ->join('subscriptions', 'subscription_reports.subscription_id', '=', 'subscriptions.id')
            ->select(
                'subscription_reports.id as report_id',
                'subscriptions.full_name',
                'subscriptions.document',
                'subscriptions.email',
                'subscriptions.phone',
                'report_credit_cards.bank as company',
                DB::raw("'Tarjeta de crédito' as type"),
                DB::raw("NULL as status"),
                DB::raw("0 as delay"),
                'report_credit_cards.bank as entity',
                DB::raw("NULL as total_amount"),
                'report_credit_cards.line as line_total',
                'report_credit_cards.used as line_used',
                'subscription_reports.created_at as report_date'
            );

        if ($inicio) {
            $prestamos->whereDate('subscription_reports.created_at', '>=', $inicio);
            $otras->whereDate('subscription_reports.created_at', '>=', $inicio);
            $tarjetas->whereDate('subscription_reports.created_at', '>=', $inicio);
        }

        if ($fin) {
            $prestamos->whereDate('subscription_reports.created_at', '<=', $fin);
            $otras->whereDate('subscription_reports.created_at', '<=', $fin);
            $tarjetas->whereDate('subscription_reports.created_at', '<=', $fin);
        }

        return $prestamos->unionAll($otras)->unionAll($tarjetas)->orderBy('report_id');
    }
}
