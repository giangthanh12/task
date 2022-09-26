@extends("layouts.app")
@section("content")
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route("admin.checklist_groups.update", $checklistGroup->id)}}" method="post">
                @csrf
                @method("put")
                <div class="card-header">{{__("New checklist group")}}</div>
                <div class="card-body">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-739">
                        <div class="mb-3">
                          <label class="form-label" for="name">{{__("Name")}}</label>
                          <input class="form-control" id="name" name="name" type="name" value="{{$checklistGroup->name}}" placeholder="{{ __("Checklist group name")}}">
                        </div>
                      </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">{{__("Submit")}}</button>
                </div>
            </form>
        </div>
        <br>
        <form action="{{route("admin.checklist_groups.destroy", $checklistGroup->id)}}" method="post">
            @csrf
            @method("delete")
            <button onclick="return confirm('Do you delete this checklist group ?')" class="btn btn-sm btn-danger text-white" type="submit">{{__("Delete this checklist group")}}</button>
        </form>
    </div>
</div>
@endsection
