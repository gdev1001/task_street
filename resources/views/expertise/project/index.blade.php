@extends('expertise.main') 
	@section('content')
            <div class="menubar">
                <div class="sidebar-toggler visible-xs">
                    <i class="ion-navicon"></i>
                </div>
                <div class="page-title">
                    Project
                </div>
            </div>
            <div class="content-wrapper clearfix">
                <ul class="nav nav-tabs nav-pills" role="tablist">
                    <li class="active">
                        <a href="#tab-all-project" role="tab" data-toggle="tab" title="Tab One">
                            All Project
                        </a>
                    </li>
                    <li>
                        <a href="#tab-my-project" role="tab" data-toggle="tab" title="Tab Two">
                            My Project
                        </a>
                    </li>
                    <li>
                        <a href="#tab-interview-project" role="tab" data-toggle="tab" title="Tab Two">
                            Interview Project
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- All Project -->
                    <div class="tab-pane fade in active" id="tab-all-project" role="tabpanel">
                        <div class="row project-list">
                            @foreach ($projects as $key => $project)
                            <div class="project">
                                <div class="col-md-9 col-sm-8">
                                    <h3 class="name">{{ $project->name }}</h3>
                                    <h4 class="category">{{ $project->status }}</h4>
                                    <div class="last-update">
                                        Last updated 3 hours ago
                                    </div>
                                    <br/>
                                    <div class="project-des">{!! $project->description !!}</div>
                                    <br/>
                                    <div class="project-skills">
                                        <strong>Skills:&nbsp;</strong>

                                        <a href="#">PHP</a>
                                        <a href="#">JavaScript</a>
                                        <a href="#">Angular JS</a>
                                    </div>
                       
                                </div>
                                <div class="project-divider"></div>
                                <div class="col-md-3 col-sm-4">
                                    <a  href="{!! URL::route('expertise.admin', $project->id )!!}" class="btn btn-primary project-admin-link">Admin</a>
                                    <h4 class="project-info"><i class="fa fa-briefcase"></i> Project Info</h4>
                                    <div class="project-budget">
                                        <h4>Budget</h4>
                                        <p>${{ $project->budget}}</p>
                                    </div>
                                    <div class="project-done-date">
                                        <h4>Completion Date</h4>
                                        <p>25/06/16</p>
                                        <div class="progress-parrent text-left">
                                            <p>70% Completed</p>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                    <span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- / END All Project -->
                    <!-- My Project -->
                    <div class="tab-pane fade" id="tab-my-project" role="tabpanel">
                        <div class="row project-list">
                         @foreach ($mprojects as $key => $project)
                            <div class="project">
                                <div class="info">
                                    <div class="name"><a href="task.html">{{ $project->name }}</a></div>
                                    <div class="category">Design & Development</div>
                                    <div class="last-update">
                                        {{$project->updated_at->diffForHumans()}}
                                    </div>
                                    <br/>
                                    <div class="project-des">{!!$project->description !!}</div>
                                    <br/>
                                    <div class="project-skills">
                                        <strong>Skills:</strong>
                                        <p><span>PHP</span>, <span>JavaScript</span></p>
                                    </div>
                                    <div class="project-budget">
                                        <p><strong>Budget:&nbsp;&nbsp;</strong>{{ $project->budget }}</p>
                                    </div>
                                    <div class="project-done-date">
                                        <p><strong>Conpletion Date:&nbsp;&nbsp;</strong>{{ $project->end_time }}</p>
                                    </div>
                                    <div class="project-company-info">
                                        <strong>Company Info:</strong>
                                        <p><strong>Name:&nbsp;&nbsp;</strong>{{Auth::user()->name}}</p>
                                        <p><strong>Email:&nbsp;&nbsp;</strong>{{Auth::user()->email}}</p>
<!--                                         <p><strong>WWW:&nbsp;&nbsp;</strong><a href="#" targer="_blank">site.com</a></p>
 -->                                    </div>
                                </div>
                                <div class="members text-center">
                                    <a href=""><img src="img/avatars/3.jpg" /></a>
                                    <a href=""><img src="img/avatars/7.jpg" /></a>
                                    <a href=""><img src="img/avatars/14.jpg" /></a>
                                    <a href=""><img src="img/avatars/15.jpg" /></a>
                                </div>
                                <div class="manage-project-overlay">
                                    <div class="mp-overlay-inner text-center">
                                        <a  href="{!! URL::route('expertise.view', $project['id'] )!!}" class="btn btn-primary manage-project-link">Manage Mini-Tasks</a>
                                        <br/>
                                        <br/>
                                        <a href="{{url("/".$project->id."/wiki")}}" class="btn btn-primary manage-docs-link">Manage Client Requirements</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
               
                        </div>
                    </div>
                    <!-- / END My Project -->

                    <div class="tab-pane fade" id="tab-interview-project" role="tabpanel">
                        <div class="row project-list">
                         @foreach ($iprojects as $key => $project)
                            <div class="project">
                                <div class="info">
                                    <div class="name"><a href="task.html">{{ $project->name }}</a></div>
                                    <div class="category">Design & Development</div>
                                    <div class="last-update">
                                        {{$project->updated_at->diffForHumans()}}
                                    </div>
                                    <br/>
                                    <div class="project-des">{!!$project->description !!}</div>
                                    <br/>
                                    <div class="project-skills">
                                        <strong>Skills:</strong>
                                        <p><span>PHP</span>, <span>JavaScript</span></p>
                                    </div>
                                    <div class="project-budget">
                                        <p><strong>Budget:&nbsp;&nbsp;</strong>{{ $project->budget }}</p>
                                    </div>
                                    <div class="project-done-date">
                                        <p><strong>Conpletion Date:&nbsp;&nbsp;</strong>{{ $project->end_time }}</p>
                                    </div>
                                    <div class="project-company-info">
                                        <strong>Company Info:</strong>
                                        <p><strong>Name:&nbsp;&nbsp;</strong>{{Auth::user()->name}}</p>
                                        <p><strong>Email:&nbsp;&nbsp;</strong>{{Auth::user()->email}}</p>
<!--                                         <p><strong>WWW:&nbsp;&nbsp;</strong><a href="#" targer="_blank">site.com</a></p>
 -->                                    </div>
                                </div>
                                <div class="members text-center">
                                    <a href=""><img src="img/avatars/3.jpg" /></a>
                                    <a href=""><img src="img/avatars/7.jpg" /></a>
                                    <a href=""><img src="img/avatars/14.jpg" /></a>
                                    <a href=""><img src="img/avatars/15.jpg" /></a>
                                </div>
                                <div class="manage-project-overlay">
                                    <div class="mp-overlay-inner text-center">
                                        <a  href="{!! URL::route('expertise.view', $project['id'] )!!}" class="btn btn-primary manage-project-link">Manage Mini-Tasks</a>
                                        <br/>
                                        <br/>
                                        <a href="{{url("/".$project->id."/wiki")}}" class="btn btn-primary manage-docs-link">Manage Client Requirements</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
               
                        </div>
                    </div>
                </div>
            </div>
    
  @endsection
