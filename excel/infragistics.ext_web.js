/*!@license
* Infragistics.Web.ClientUI infragistics.ext_web.js 18.1.20181.198
*
* Copyright (c) 2011-2018 Infragistics Inc.
*
* http://www.infragistics.com/
*
* Depends:
*     jquery-1.4.4.js
*     jquery.ui.core.js
*     jquery.ui.widget.js
*     infragistics.util.js
*     infragistics.ext_core.js
*     infragistics.ext_collections.js
*     infragistics.ext_io.js
*     infragistics.ext_text.js
*     infragistics.ext_threading.js
*/
(function(factory){if(typeof define==="function"&&define.amd){define(["./infragistics.util","./infragistics.ext_core","./infragistics.ext_collections","./infragistics.ext_io","./infragistics.ext_text","./infragistics.ext_threading"],factory)}else{factory(igRoot)}})(function($){$.ig=$.ig||{};var $$t={};$.ig.globalDefs=$.ig.globalDefs||{};$.ig.globalDefs.$$b=$$t;$$0=$.ig.globalDefs.$$0;$$1=$.ig.globalDefs.$$1;$$4=$.ig.globalDefs.$$4;$$6=$.ig.globalDefs.$$6;$$7=$.ig.globalDefs.$$7;$$8=$.ig.globalDefs.$$8;$$9=$.ig.globalDefs.$$9;$.ig.$currDefinitions=$$t;$.ig.util.bulkDefine(["ICredentials:c","NetworkCredential:d","UploadDataCompletedEventHandler:e","UploadStringCompletedEventHandler:g"]);var $a=$.ig.intDivide,$b=$.ig.util.cast,$c=$.ig.util.defType,$d=$.ig.util.defEnum,$e=$.ig.util.getBoxIfEnum,$f=$.ig.util.getDefaultValue,$g=$.ig.util.getEnumValue,$h=$.ig.util.getValue,$i=$.ig.util.intSToU,$j=$.ig.util.nullableEquals,$k=$.ig.util.nullableIsNull,$l=$.ig.util.nullableNotEquals,$m=$.ig.util.toNullable,$n=$.ig.util.toString$1,$o=$.ig.util.u32BitwiseAnd,$p=$.ig.util.u32BitwiseOr,$q=$.ig.util.u32BitwiseXor,$r=$.ig.util.u32LS,$s=$.ig.util.unwrapNullable,$t=$.ig.util.wrapNullable,$u=String.fromCharCode,$v=$.ig.util.castObjTo$t,$w=$.ig.util.compare,$x=$.ig.util.replace,$y=$.ig.util.stringFormat,$z=$.ig.util.stringFormat1,$0=$.ig.util.stringFormat2,$1=$.ig.util.stringCompare1,$2=$.ig.util.stringCompare2,$3=$.ig.util.stringCompare3;$c("UriParser:a","Object",{init:function(){$.ig.$op.init.call(this)},a:function(a){return $$t.$a.b.contains(a.toLowerCase())},$type:new $.ig.Type("UriParser",$.ig.$ot)},true);$c("JavaScriptSerializer:k","Object",{init:function(){$.ig.$op.init.call(this)},a:function(a){var text_=a;return JSON.parse(text_)},b:function(a){var value_=a;return JSON.stringify(value_)},$type:new $.ig.Type("JavaScriptSerializer",$.ig.$ot)},true);$c("BinaryFileDownloader:b","Object",{init:function(){$.ig.$op.init.call(this)},a:function(uri_,callback_,errorCallback_){$.ig.util.getBinary(uri_,callback_,errorCallback_)},$type:new $.ig.Type("BinaryFileDownloader",$.ig.$ot)},true);$c("ICredentials:c","Object",{$type:new $.ig.Type("ICredentials",null)},true);$c("NetworkCredential:d","Object",{init:function(a,b,c){if(a>0){switch(a){case 1:this.init1.apply(this,arguments);break}return}$$t.$d.init1.call(this,1,b,c,String.empty())},init1:function(a,b,c,d){$.ig.$op.init.call(this);this.userName(b);this.password(c);this.domain(d)},getCredential:function(a,b){return this},_userName:null,userName:function(a){if(arguments.length===1){this._userName=a;return a}else{return this._userName}},_password:null,password:function(a){if(arguments.length===1){this._password=a;return a}else{return this._password}},_domain:null,domain:function(a){if(arguments.length===1){this._domain=a;return a}else{return this._domain}},$type:new $.ig.Type("NetworkCredential",$.ig.$ot,[$$t.$c.$type])},true);$c("UploadDataCompletedEventArgs:f","AsyncCompletedEventArgs",{i:null,init:function(a,b,c,d){$$6.$ae.init.call(this,b,c,d);this.i=a},result:function(){this.h();return this.i},$type:new $.ig.Type("UploadDataCompletedEventArgs",$$6.$ae.$type)},true);$c("UploadStringCompletedEventArgs:h","AsyncCompletedEventArgs",{i:null,init:function(a,b,c,d){$$6.$ae.init.call(this,b,c,d);this.i=a},result:function(){this.h();return this.i},$type:new $.ig.Type("UploadStringCompletedEventArgs",$$6.$ae.$type)},true);$c("WebClient:i","Object",{init:function(){$.ig.$op.init.call(this);this._d=new $$t.j},_e:null,_d:null,_a:null,uploadStringCompleted:null,k:function(a,b,c,d){var $self=this;this.g(a,b,c).i(function(e){if($self.uploadStringCompleted!=null){var f=null;var g=null;try{f=e.m()}catch(e_){g=e_}$self.uploadStringCompleted($self,new $$t.h(f,g,e.g()==6,d))}})},g:function(a,b,c){var url_=a.value();var method_=b;var data_=c;var contentType_=this._d.item("Content-Type");var credentials_=this._a;var d=$.ig.util.ajax(url_,contentType_,data_,method_,credentials_);return new $$9.a(String,d,null)},uploadDataCompleted:null,j:function(a,b,c,d){var $self=this;this.f(a,b,c).i(function(e){if($self.uploadDataCompleted!=null){var f=null;var g=null;try{f=e.m()}catch(e_){g=e_}$self.uploadDataCompleted($self,new $$t.f(f,g,e.g()==6,d))}})},f:function(a,b,c){var url_=a.value();var method_=b;var data_=c;var contentType_=this._d.item("Content-Type");var credentials_=this._a;var d=$.ig.util.ajax(url_,contentType_,data_,method_,credentials_);return new $$9.a(Array,d,null)},i:function(a,b,c,d){a.e(b)},h:function(a,b,c,d){a.d(new $$0.n(1,d))},$type:new $.ig.Type("WebClient",$.ig.$ot)},true);$c("WebHeaderCollection:j","NameValueCollection",{init:function(){$$4.$af.init.call(this)},$type:new $.ig.Type("WebHeaderCollection",$$4.$af.$type)},true);$$t.$a.b=new $$4.w(String,1,["http","https","ws","wss","ftp","file","gopher","nntp","news","mailto","uuid","telnet","ldap","net.tcp","net.pipe"])});(function(factory){if(typeof define==="function"&&define.amd){define("watermark",["jquery"],factory)}else{factory(jQuery)}})(function($){$(document).ready(function(){var wm=$("#__ig_wm__").length>0?$("#__ig_wm__"):$("<div id='__ig_wm__'></div>").appendTo(document.body);wm.css({position:"fixed",bottom:0,right:0,zIndex:1e3}).addClass("ui-igtrialwatermark")})});