<?php
// My common functions
function isAdmin()
{
	if (Auth::guard('admin')->check()){
		return 1;
	}
	return 0;
}

function isSoftwareEngineer()
{
	if(!isAdmin())
		return 0;
	else
		return (strcmp(Auth::guard('admin')->user()->type,"software_engineer") == 0);
}

function isAccountant()
{
	if(!isAdmin())
		return 0;
	else
		return (strcmp(Auth::guard('admin')->user()->type,"accountant") == 0);
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

function getMerchantStatus()
{
	if (Auth::guard('merchant')->check()){
		return Auth::guard('merchant')->user()->status;
	}
	return 0;
}

function isMerchantApproved()
{
	if (Auth::guard('merchant')->check()){
		return (strcmp(Auth::guard('merchant')->user()->status,'Diterima')==0);
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