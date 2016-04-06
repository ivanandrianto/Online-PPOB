<?php
// My common functions
function isAdmin()
{
	if (Auth::guard('admin')->check()){
		return 1;
	}
	return 0;
}

function isMerchant()
{
	if (Auth::guard('merchant')->check()){
		return 1;
	}
	return 0;
}

function getMerchantID()
{
	if (Auth::guard('merchant')->check()){
		return Auth::guard('merchant')->user()->id;
	}
	return 0;
}

function isAuthenticated()
{
	if ((Auth::guard('merchant')->check()) || (Auth::guard('admin')->check())){
		return 1;
	}
	return 0;
}