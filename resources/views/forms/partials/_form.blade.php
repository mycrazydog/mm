    <!-- Tabs Content -->
    <div class="tab-content">

        <!-- General tab -->
        <div class="tab-pane active" id="tab-general">
            <br>

         
        </div><!--/.tab-pane -->

        <!-- Meta Data tab
        <div class="tab-pane" id="tab-meta-data">
            <br>
            <div class="form-group {{ $errors->first('meta-title', 'has-error') }}">
                <label for="meta-title" class="col-sm-3 control-label">@lang('admin/posts/form.metatitle')</label>
                <div class="col-sm-5">
                    {{ Form::text('meta-title', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-sm-4">
                    {{ $errors->first('meta-title', '<span class="help-block">:message</span>') }}
                </div>
            </div>
            <div class="form-group {{ $errors->first('meta-description', 'has-error') }}">
                <label for="meta-description" class="col-sm-3 control-label">@lang('admin/posts/form.metadescription')</label>
                <div class="col-sm-5">
                    {{ Form::text('meta-description', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-sm-4">
                    {{ $errors->first('meta-description', '<span class="help-block">:message</span>') }}
                </div>
            </div>
            <div class="form-group {{ $errors->first('meta-keywords', 'has-error') }}">
                <label for="meta-keywords" class="col-sm-3 control-label">@lang('admin/posts/form.metakeywords')</label>
                <div class="col-sm-5">
                    {{ Form::text('meta-keywords', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-sm-4">
                    {{ $errors->first('meta-keywords', '<span class="help-block">:message</span>') }}
                </div>
            </div>

        </div>/.tab-pane -->

     </div><!--/.tab-content -->




    <!-- Form Actions -->
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <a class="btn btn-link" href="{!! route('posts') !!}">Cancel</a>
        <button type="submit" class="btn btn-default">Save</button>
      </div>
    </div>
