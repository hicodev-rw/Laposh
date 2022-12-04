@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Message form {{$message->email}}</strong></h1>

					
						<div class="col-xl-6 col-l-7" style="margin:auto;">
							<div class="card flex-fill">
									<div class="card-body">
									<h3 class="card-title mb-0">Content</h3>
									<hr/>
									<h4>{{$message->content}}</h4>
								</div>
                                <center>
                                <a href="{{ url('/management/messages/'. $message->id .'/edit') }}" class="btn btn-primary btn-md" style="width:95%;">Reply</a>
                                </center>
                            </div>

                                    </div>
					</div>
				

				<hr/>
</tbody>
</table>
</div>
</div>
</div>
			</main>
@endsection