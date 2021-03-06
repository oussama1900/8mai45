@extends('layouts.template')
@section('content')
  <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/formvalidation/formValidation.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/forms/validation.css">
  <div class="page-header">
  <h1 class="page-title font_kufi">Validation </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">Validation</li>
	</ol>
  </div>
</div> 
 <div class="page-content container-fluid">
      <!-- Panel Validation Styles -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Validation Styles</h3>
        </div>
        <div class="panel-body">
          <p>Avalon includes validation styles for error, warning, and success states
            on form controls. To use, add <code>.has-warning</code>, <code>.has-error</code>,
            or <code>.has-success</code> to the parent element. Any <code>.control-label</code>,
            <code>.form-control</code>, and <code>.help-block</code> within that
            element will receive the validation styles</p>
          <form class="row">
            <div class="col-md-4 form-group has-success has-feedback">
              <div class="row">
                <label class="col-md-12 col-sm-3 control-label">Input with Success</label>
                <div class="col-md-12 col-sm-9">
                  <input type="text" class="form-control" id="inputSuccess" aria-describedby="inputSuccessStatus">
                  <span class="form-control-feedback" aria-hidden="true"><i class="icon wb-check" aria-hidden="true"></i></span>
                  <span class="sr-only" id="inputSuccessStatus">(success)</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 form-group has-warning has-feedback">
              <div class="row">
                <label class="col-md-12 col-sm-3 control-label">Input with Warning</label>
                <div class="col-md-12 col-sm-9">
                  <input type="text" class="form-control" id="inputWarning" aria-describedby="inputWarningStatus">
                  <span class="form-control-feedback" aria-hidden="true"><i class="icon wb-warning" aria-hidden="true"></i></span>
                  <span class="sr-only" id="inputWarningStatus">(warning)</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 form-group has-error has-feedback">
              <div class="row">
                <label class="col-md-12 col-sm-3 control-label">Input with Error</label>
                <div class="col-md-12 col-sm-9">
                  <input type="text" class="form-control" id="inputError" aria-describedby="inputErrorStatus">
                  <span class="form-control-feedback" aria-hidden="true"><i class="icon wb-close" aria-hidden="true"></i></span>
                  <span class="sr-only" id="inputErrorStatus">(error)</span>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- End Panel Validation Styles -->
      <div class="row">
        <div class="col-md-6">
          <!-- Panel Standard Mode -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Standard Mode</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" id="exampleStandardForm" autocomplete="off">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Full name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="standard_fullName" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="standard_email" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Content</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="standard_content" rows="5"></textarea>
                  </div>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- End Panel Standard Mode -->
        </div>
        <div class="col-md-6">
          <!-- Panel Summary Mode -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Summary Mode</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" id="exampleSummaryForm" autocomplete="off">
                <div class="summary-errors alert alert-danger alert-dismissible">
                  <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                    <span aria-hidden="true">�</span>
                  </button>
                  <p>Errors list below: </p>
                  <ul></ul>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Full name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="summary_fullName" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="summary_email" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Content</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="summary_content" rows="5"></textarea>
                  </div>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton3">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- End Panel Summary Mode -->
        </div>
      </div>
      <!-- Panel Full Example -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Full Example
            <span class="panel-desc">Basic validation will display a label with the error after the form
              control. </span>
          </h3>
        </div>
        <div class="panel-body">
          <form id="exampleFullForm" autocomplete="off">
            <div class="row row-lg">
              <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Username
                    <span class="required">*</span>
                  </label>
                  <div class=" col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="username" placeholder="John Fish"
                    required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Email
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-envelope" aria-hidden="true"></i>
                      </span>
                      <input type="email" class="form-control" name="email" placeholder="email@email.com"
                      required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Password
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-lock" aria-hidden="true"></i>
                      </span>
                      <input type="password" class="form-control" name="password" placeholder="Min length 8"
                      required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Birthday
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="birthday" placeholder="YYYY/MM/DD"
                    required="" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">GitHub</label>
                  <div class="col-lg-12 col-sm-9">
                    <input type="url" class="form-control" name="github" placeholder="https://github.com/amazingSurge">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Company</label>
                  <div class="col-lg-12 col-sm-9">
                    <select class="form-control" id="company" name="company" required="">
                      <option value="">Choose a Company</option>
                      <option value="apple">Apple</option>
                      <option value="google">Google</option>
                      <option value="microsoft">Microsoft</option>
                      <option value="yahoo">Yahoo</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Remark Admin is
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <div class="input-group">
                      <div>
                        <div class="radio-custom radio-primary">
                          <input type="radio" id="inputAwesome" name="porto_is" value="awesome" required="">
                          <label for="inputAwesome">Awesome</label>
                        </div>
                      </div>
                      <div>
                        <div class="radio-custom radio-primary">
                          <input type="radio" id="inputVeryAwesome" name="porto_is" value="very-awesome">
                          <label for="inputVeryAwesome">Very Awesome</label>
                        </div>
                      </div>
                      <div>
                        <div class="radio-custom radio-primary">
                          <input type="radio" id="inputUltraAwesome" name="porto_is" value="ultra-awesome">
                          <label for="inputUltraAwesome">Ultra Awesome</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">I will use it for
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <div class="input-group">
                      <div>
                        <div class="checkbox-custom checkbox-primary">
                          <input type="checkbox" id="inputForProject" name="for[]" value="project" required="">
                          <label for="inputForProject">My Project</label>
                        </div>
                      </div>
                      <div>
                        <div class="checkbox-custom checkbox-primary">
                          <input type="checkbox" id="inputForWebsite" name="for[]" value="website">
                          <label for="inputForWebsite">My Website</label>
                        </div>
                      </div>
                      <div>
                        <div class="checkbox-custom checkbox-primary">
                          <input type="checkbox" id="inputForAll" name="for[]" value="all">
                          <label for="inputForAll">All things I do</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Skills
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <textarea class="form-control" name="skills" rows="3" placeholder="Describe your skills"
                    required=""></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Browsers</label>
                  <div class="col-lg-12 col-sm-9">
                    <select class="form-control" id="browsers" name="browsers" title="Please select at least one browser"
                    size="5" multiple="multiple" required="">
                      <option value="chrome">Chrome / Safari</option>
                      <option value="ff">Firefox</option>
                      <option value="ie">Internet Explorer</option>
                      <option value="opera">Opera</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group col-lg-12 text-right padding-top-m">
                <button type="submit" class="btn btn-primary" id="validateButton1">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- End Panel Full Example -->
      <!-- Panel Constraints -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Constraints</h3>
        </div>
        <div class="panel-body">
          <div class="row row-lg">
            <div class="col-md-6">
              <!-- Example Basic Constraints -->
              <div class="example-wrap margin-md-0">
                <h4 class="example-title">Basic Constraints</h4>
                <div class="example">
                  <form class="form-horizontal" id="exampleConstraintsForm" autocomplete="off">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Required</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="requiredInput" data-fv-notempty="true"
                        data-fv-notempty-message="This is required">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-9">
                        <select class="form-control" name="requiredSelect" data-fv-notempty="true">
                          <option value="">Please choose</option>
                          <option value="foo">Foo</option>
                          <option value="bar">Bar</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-9">
                        <div class="input-group">
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="requiredCheckbox" name="requiredCheckbox" data-fv-notempty="true"
                            data-fv-notempty-message="This is required">
                            <label for="requiredCheckbox">Agree to the policy</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Min Length</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="vMinLength" data-fv-stringlength="true"
                        data-fv-stringlength-min="8" data-fv-notempty-message="This is required"
                        data-fv-stringlength-message="please enter more than 8 length"
                        placeholder="minlength = 8" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Max Length</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="vMaxLength" data-fv-stringlength="true"
                        data-fv-stringlength-max="3" data-fv-stringlength-message="please enter less than 3 length"
                        placeholder="maxlength = 3" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Range Length</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="vBetweenLength" data-fv-stringlength="true"
                        data-fv-stringlength-max="10" data-fv-stringlength-min="5"
                        data-fv-stringlength-message="please enter between 5 to 10 length"
                        placeholder="data-rangelength = [5,10]">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Min</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="vMin" data-fv-greaterthan="true"
                        data-fv-greaterthan-value="6" data-fv-greaterthan-message="please enter more than 6"
                        placeholder="min = 6">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Max</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="vMax" data-fv-lessthan="true" data-fv-lessthan-value="50"
                        data-fv-greaterthan-message="please enter less than 50"
                        placeholder="max = 50">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Range</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="vRange" data-fv-between="true" data-fv-between-min="6"
                        data-fv-between-max="50" data-fv-between-message="please enter between[6,50]"
                        placeholder="range = [6, 50]">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">RegExp</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="vRegExp" data-fv-regexp="true" data-fv-regexp-regexp="#[A-Fa-f0-9]{6}"
                        data-fv-regexp-message="please enter hexa color code" placeholder="hexa color code">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Equal To (confirm)</label>
                      <div class="col-sm-9">
                        <div class="row">
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="foo_one" data-fv-notempty="true"
                            data-fv-notempty-message="The content is required and cannot be empty"
                            data-fv-identical="true" data-fv-identical-field="foo_two"
                            data-fv-identical-message="The content and its confirm are not the same"
                            />
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="foo_two" data-fv-notempty="true"
                            data-fv-notempty-message="The confirm content is required and cannot be empty"
                            data-fv-identical="true" data-fv-identical-field="foo_one"
                            data-fv-identical-message="The content and its confirm are not the same"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Example Basic Constraints -->
            </div>
            <div class="col-md-6">
              <!-- Example Type -->
              <div class="example-wrap">
                <h4 class="example-title">Type</h4>
                <div class="example">
                  <form class="form-horizontal" id="exampleConstraintsFormTypes" autocomplete="off">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="type_email" placeholder="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Url</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="type_url" placeholder="url">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Digits</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="type_digits" placeholder="digits">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="type_numberic" placeholder="number">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Color</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="type_color" placeholder="color">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Date</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="type_date" placeholder="YYYY-MM-DD">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="type_phone" placeholder="(XXX) XXXX XXX">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Credit Card</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="type_credit_card" placeholder="creditCard">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">IP</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="type_ip" placeholder="ip">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Example Type -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Constraints -->
    </div>
<br/>
@stop

 
