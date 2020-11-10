<?php
 function dataUser(){
     return \App\Models\User::findOrFail(auth()->user()->id)->dataUser;
 }


