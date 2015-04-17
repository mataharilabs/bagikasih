<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => ":attribute harus diterima.",
	"active_url"       => ":attribute bukan URL yang sah.",
	"after"            => ":attribute harus sebuah tanggal setelah :date.",
	"alpha"            => ":attribute hanya boleh terdiri dari huruf.",
	"alpha_dash"       => ":attribute hanya boleh terdiri dari huruf, angka, dan tanda garis.",
	"alpha_num"        => ":attribute hanya boleh terdiri dari huruf dan angka.",
	"array"            => ":attribute harus sebuah array.",
	"before"           => ":attribute harus sebuah tanggal sebelum :date.",
	"between"          => array(
		"numeric" => ":attribute harus di antara :min dan :max.",
		"file"    => ":attribute harus di antara :min dan :max kilobytes.",
		"string"  => ":attribute harus di antara :min dan :max karakter.",
		"array"   => ":attribute harus di antara :min dan :max item.",
	),
	"boolean"          => ":attribute harus berupa true atau false.",
	"confirmed"        => ":attribute konfirmasi tidak sah.",
	"date"             => ":attribute bukan sebuah tanggal yang sah.",
	"date_format"      => ":attribute tidak sesuai dengan format :format.",
	"different"        => ":attribute dan :other harus berbeda.",
	"digits"           => ":attribute harus angka :digits.",
	"digits_between"   => ":attribute harus angka di antara :min dan :max.",
	"email"            => "Format :attribute tidak sah.",
	"exists"           => ":attribute yang terpilih tidak sah.",
	"image"            => ":attribute harus sebuah gambar.",
	"in"               => ":attribute yang terpilih tidak sah.",
	"integer"          => ":attribute harus sebuah angka.",
	"ip"               => ":attribute harus sebuah alamat IP yang sah.",
	"max"              => array(
		"numeric" => ":attribute tidak boleh lebih besar daripada :max.",
		"file"    => ":attribute tidak boleh lebih besar daripada :max kilobytes.",
		"string"  => ":attribute tidak boleh lebih besar daripada :max karakter.",
		"array"   => ":attribute tidak boleh lebih besar daripada :max item.",
	),
	"mimes"            => ":attribute harus sebuah file dengan tipe: :values.",
	"min"              => array(
		"numeric" => ":attribute harus setidaknya :min.",
		"file"    => ":attribute harus setidaknya :min kilobytes.",
		"string"  => ":attribute harus setidaknya :min karakter.",
		"array"   => ":attribute harus setidaknya :min item.",
	),
	"not_in"           => ":attribute yang terpilih tidak sah.",
	"numeric"          => ":attribute harus sebuah angka.",
	"regex"            => ":attribute format tidak sah.",
	"required"         => ":attribute dibutuhkan.",
	"required_if"      => ":attribute dibutuhkan ketika :other bernilai :value.",
	"required_with"    => ":attribute dibutuhkan ketika :values diberikan.",
	"required_with_all"    => ":attribute dibutuhkan ketika :values diberikan.",
	"required_without" 	   => ":attribute dibutuhkan ketika :values tidak diberikan.",
	"required_without_all" => ":attribute dibutuhkan ketika tidak ada :values diberikan.",
	"same"             => ":attribute dan :other tidak sama.",
	"size"             => array(
		"numeric" => ":attribute harus :size.",
		"file"    => ":attribute harus :size kilobytes.",
		"string"  => ":attribute harus :size karakter.",
		"array"   => ":attribute harus mengandung :size item.",
	),
	"unique"           => ":attribute sudah terpakai.",
	"url"              => ":attribute format tidak sah.",
	"timezone"         => ":attribute harus sebuah zona yang sah.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),


);
