@extends('layouts.app')

@section('title', trans('flyff::messages.characters').' - '. $character->m_szName)

@section('content')
    <div class="container content" id="plugin--flyff">

        <div class="row">
            <div class="col-12">

                <div class="media rounded p-3" data-aos="fade-up">
                    <img src="{{$character->AvatarUrl}}" class="align-self-center mr-3" alt="...">
                    <div class="media-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{$character->SexIcon}}" alt="">
                                <img src="{{$character->JobIcon}}" alt="">
                                <h5 class="mt-0">{{$character->m_szName}}: {{$character->m_nLevel}}</h5>
                            </div>
                            <div class="col-md-3">
                                <p>STR: {{$character->m_nStr}}</p>
                                <p>END: {{$character->m_nSta}}</p>
                            </div>
                            <div class="col-md-3">
                                <p>DEX: {{$character->m_nDex}}</p>
                                <p>INT: {{$character->m_nInt}}</p>
                            </div>
                            <div class="col-md-3">
                                <p>PKValue: {{$character->PKValue}}</p>
                                <p>TotalTimePlayed: {{$character->TotalTimePlayed}}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
