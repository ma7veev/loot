<?php
   
   use App\Models\Items;
?>

@extends('layouts.app')
@section('content')
  
   <operations items_prop="{{json_encode(Items::select(['name', 'id'])->get())}}"></operations>
   @stop