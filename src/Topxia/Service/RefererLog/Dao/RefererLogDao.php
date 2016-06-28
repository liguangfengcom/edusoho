<?php
namespace Topxia\Service\RefererLog\Dao;

interface RefererLogDao
{
    public function addRefererLog($referLog);

    public function getRefererLogById($id);

    public function searchAnalysisSummary($conditions, $groupBy);

    public function searchAnalysisSummaryList($conditions, $groupBy, $start, $limit);

    public function searchAnalysisDetail($conditions, $groupBy);

    public function searchAnalysisDetailList($conditions, $groupBy, $start, $limit);

    public function searchAnalysisDetailListCount($conditions);

    public function searchAnalysisSummaryListCount($conditions);

    public function searchRefererLogs($conditions, $orderBy, $start, $limit);

    public function searchRefererLogCount($conditions);
}
