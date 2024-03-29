
@php
	
	function sendit_or_not($request_docs,$name)
	{
		foreach($request_docs->type_documents as $document )
		{
			if($document->name == $name)
				return 'send_it';

		}
		return 'no_send';
	}

@endphp

<div class="modal-body-edit bg-white">
	
	<aside class="side-menu">
		<nav class="navbar navbar-expand-lg navbar-light bg-white flex-column p-0 " id="doc-menu">
			  <div class="container-fluid p-0" id="container-menu-docs">
			     <button class="hamburger shadow-none navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			     	<span class="hamburger-box">
			    		<span class="hamburger-inner"></span>
		  	  		</span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto  flex-column" id="nav-documents" >

			      	@foreach($docs as $doc)

						<li class="btn-outline li-doc p-3 text-white {{sendit_or_not($request_docs,$doc->name)}}" id-doc="{{$doc->id}}">{{ str_replace('_',' ',$doc->name) }}</li>

					@endforeach
			    </ul>
			    </div>
			  </div>
		</nav>
	</aside>

	<div class="modal-content-edit">
		<div class="d-flex justify-content-between">

			<div class="offset-5 box-name">
				<h4 class="text-dark pt-1">{{$request_docs->name.' '.$request_docs->last_name}}</h4>
			</div>
			<div class="h-fit">
				<button class="hamburger hamburger--slider is-active" id="close-model-docs" type="button">
				  <span class="hamburger-box">
				    <span class="hamburger-inner"></span>
			  	  </span>
				</button>
			</div>

		</div>

		<section class="body-doc h-75 d-flex justify-content-center align-items-center" id="initial_section">
		
			<h5>Seleccione un documento.</h5>

		</section>
		@foreach($request_docs->type_documents as $document )
			<section class="body-doc d-none justify-content-center align-items-start pt-1 h-100" id="doc-{{$document->id}}">
					
				@php

					$str = explode(".",$document->pivot->name);

				@endphp

				@if($str[1] != 'pdf')

				<img src="{{Storage::url('request/'.$document->name.'/'.$document->pivot->name);}}" class="document-img" alt="Documento">

				@else

				<iframe src="{{Storage::url('request/'.$document->name.'/'.$document->pivot->name);}}"  alt="Documento" style="width:95%; height: 80%;"></iframe>

				@endif

			</section>

		@endforeach

	</div>

</div>



