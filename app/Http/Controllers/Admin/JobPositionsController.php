<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyJobPositionRequest;
use App\Http\Requests\StoreJobPositionRequest;
use App\Http\Requests\UpdateJobPositionRequest;
use App\Models\JobPosition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobPositionsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('job_position_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobPositions = JobPosition::all();

        return view('admin.jobPositions.index', compact('jobPositions'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_position_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobPositions.create');
    }

    public function store(StoreJobPositionRequest $request)
    {
        $jobPosition = JobPosition::create($request->all());

        return redirect()->route('admin.job-positions.index');
    }

    public function edit(JobPosition $jobPosition)
    {
        abort_if(Gate::denies('job_position_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobPositions.edit', compact('jobPosition'));
    }

    public function update(UpdateJobPositionRequest $request, JobPosition $jobPosition)
    {
        $jobPosition->update($request->all());

        return redirect()->route('admin.job-positions.index');
    }

    public function show(JobPosition $jobPosition)
    {
        abort_if(Gate::denies('job_position_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobPositions.show', compact('jobPosition'));
    }

    public function destroy(JobPosition $jobPosition)
    {
        abort_if(Gate::denies('job_position_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobPosition->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobPositionRequest $request)
    {
        JobPosition::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
