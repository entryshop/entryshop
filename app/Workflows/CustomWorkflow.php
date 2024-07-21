<?php

namespace App\Workflows;

use Illuminate\Support\Facades\Log;
use Workflow\ActivityStub;
use Workflow\Workflow;
use Workflow\WorkflowStub;

class CustomWorkflow extends Workflow
{
    protected $context = [];
    protected $activities = [];

    public function execute($params = [], $activities = null)
    {
        $this->context = $params;
        $activities    = $activities ?? $this->getActivities();
        return $this->runActivities($activities);
    }

    public function getActivities()
    {
        return $this->activities;
    }

    public function runActivities($activities)
    {
        foreach ($activities as $activity) {
            $result = null;
            switch ($activity['type'] ?? null) {
                case 'condition':
                    $random = rand(1, 10);
                    if ($random > 5) {
                        Log::debug('skip activity');
                        return $this->context;
                    }
                    break;
                case 'timer':
                    yield WorkflowStub::timer($activity['value']);
                    break;
                case 'all':
                    $_activities = $activity['activities'] ?? [];
                    $all         = [];
                    foreach ($_activities as $_activity) {
                        $all[] = $this->makeActivity($_activity);
                    }
                    $results = yield ActivityStub::all($all);
                    $result  = [];
                    foreach ($results as $_result) {
                        $result = array_merge($result, $_result);
                    }
                    break;
                case 'activity':
                    $result = yield $this->makeActivity($activity);
                    break;
                default:
                    break;
            }

            if (!empty($result)) {
                $this->context = array_merge($this->context, $result);
            }
        }

        return $this->context;
    }

    public function makeActivity($activity)
    {
        return ActivityStub::make($activity['class'], $activity['params'] ?? [], $this->context);
    }

}
