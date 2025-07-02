@extends('layouts.general_layout')

@section('title', $title ?? 'feed')

@section('content')
   <!-- start: timeline -->
<div class="timeline">
						<div class="tm-body">
						@foreach($grouped as $month => $items)
							<div class="tm-title">
								<h5 class="m-0 pt-2 pb-2 text-dark font-weight-semibold text-uppercase">{{ \Carbon\Carbon::createFromFormat('Y-m', $month)->translatedFormat('F Y') }}</h5>
							</div>							
							<ol class="tm-items">
								@foreach($items as $item)
									@php
									
										if($item->source == 'news'){
											$class = "fa-regular fa-newspaper";
										}elseif($item->source == 'market'){
											$class = "fa-solid fa-cart-shopping";
										}elseif($item->source == 'project'){
											$class = "fa-solid fa-handshake";
										}elseif($item->source == 'guild'){
											$class = "fa-solid fa-people-group";
										}elseif($item->source == 'content'){
											$class = "fa-solid fa-globe";
										}elseif($item->source == 'academy'){
											$class = "fa-solid fa-book";
										}else{
											$class = "";
										}
											
									@endphp
									<li>
										<div class="tm-info">
											<div class="tm-icon"><i class="{{ $class }}"></i></div>
											<time class="tm-datetime" datetime="2023-09-08 16:13">
												<div class="tm-datetime-date">{{ $item->created_at->diffForHumans() }}</div>
												<div class="tm-datetime-time">{{ $item->created_at->format('D d') }}</div>
												<div class="tm-datetime-date">{{ $item->created_at->format('h.i A') }}</div>
											</time>
										</div>
										<div class="tm-box appear-animation" data-appear-animation="fadeInRight">
											@if(isset($item->sstm))
												<h4>
													{{ $item->sstm }}
												</h4>
											@endif
											@if($item->images)
												<div class="thumbnail-gallery">
													@foreach($item->images as $image)
														<a class="img-thumbnail" href="{{ $item->mainImage->path }}">
															<img width="215" src="{{ $item->mainImage->path }}">
															<span class="zoom">
																<i class="bx bx-search"></i>
															</span>
														</a>
													@endforeach
												</div>
											@endif
											
											<h3>
												{{ $item->title }}
											</h3>
											<p>
											{!! $item->content !!}
											</p>
											@if(isset($item->price))
												<p>
													<b>{{ $item->price }} $</b>	<button class="btn btn-primary" type="button">Buy</button>	
												</p>
											@endif
											@php
												//var_dump($product->images);
											@endphp
											
											<div class="tm-meta">
												<span>
												<img src="{{ $item->user->photo }}" alt="User Photo" style="width: 30px; border-radius:50%;"> By <a href="{{ url('/profile/' . $item->user->id) }}">{{ $item->user->name ?? 'Неизвестно' }}</a>
												</span>
												@if(isset($item->topic->title))
												<span>
													<i class="fas fa-tag"></i> <a href="#">{{ $item->topic->title}}</a>
												</span>
												@endif
												<span>
													<i class="fas fa-comments"></i> <a href="#">12 Comments</a>
												</span>
											</div>
										</div>
									</li>
									<!-- <li>
										[{{ $item->source }}] {{ $item->title }} — {{ $item->created_at->format('d.m.Y') }}
									</li> -->
								@endforeach
							</ol>
						@endforeach
							
							
						</div>
					</div>
					<!-- end: timeline -->
@endsection
