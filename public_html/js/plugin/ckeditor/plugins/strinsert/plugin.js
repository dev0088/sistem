/**
 * @license Copyright © 2013 Stuart Sillitoe <stuart@vericode.co.uk>
 * This work is mine, and yours. You can modify it as you wish.
 *
 * Stuart Sillitoe
 * stuartsillitoe.co.uk
 *
 */

CKEDITOR.plugins.add('strinsert',
{
	requires : ['richcombo'],
	init : function( editor )
	{
		//  array of strings to choose from that'll be inserted into the editor
		var strings = [];
		strings.push(['%employee-name%'			, 'Employee Name'			, 'Employee Name']);
		strings.push(['%company-name%'			, 'Company Name'			, 'Company Name']);
		strings.push(['%nss%'					, 'Nss'						, 'Nss']);
		strings.push(['%curp%'					, 'Curp'					, 'Curp']);
		strings.push(['%employee-rfc%'			, 'Employee Rfc'			, 'Employee Rfc']);
		strings.push(['%employee-sex%'			, 'Employee Sex'			, 'Employee Sex']);
		strings.push(['%employee-education%'	, 'Employee Education'		, 'Employee Education']);
		strings.push(['%employee-birth-city%'	, 'Employee Birth City'		, 'Employee Birth City']);
		strings.push(['%employee-age%'			, 'Employee Age'			, 'Employee Age']);
		strings.push(['%employee-civil-status%'	, 'Employee Civil Status' 	, 'Employee Civil Status']);
		strings.push(['%employee-address%'		, 'Employee Address'		, 'Employee Address']);
		strings.push(['%contract-initial-day%'	, 'Contract Initial Day'	, 'Contract Initial Day']);
		strings.push(['%contract-initial-month%', 'Contract Initial Month'	, 'Contract Initial Month']);
		strings.push(['%contract-initial-year%'	, 'Contract Initial Year'	, 'Contract Initial Year']);
		strings.push(['%contract-final-day%'	, 'Contract Final Day'		, 'Contract Final Day']);
		strings.push(['%contract-final-month%'	, 'Contract Final Month'	, 'Contract Final Month']);
		strings.push(['%contract-final-year%'	, 'Contract Final Year'		, 'Contract Final Year']);
		strings.push(['%contract-work-initial-day%'		, 'Contract Work Initial Day'		, 'Contract Work Initial Day']);
		strings.push(['%contract-work-initial-month%'	, 'Contract Work Initial Month'		, 'Contract Work Initial Month']);
		strings.push(['%contract-work-initial-year%'	, 'Contract Work Initial Year'		, 'Contract Work Initial Year']);
		strings.push(['%employee-salary%'				, 'Employee Salary'					, 'Employee Salary']);
		strings.push(['%employee-payment-periodicity%'	, 'Employee Payment Periodicity'	, 'Employee Payment Periodicity']);
		strings.push(['%employee-salary-letters%'		, 'Employee Salary Letters'			, 'Employee Salary Letters']);
		strings.push(['%company-city%'					, 'Company City'					, 'Company City']);
		strings.push(['%company-state%'					, 'Company State'					, 'Company State']);
		strings.push(['%date-today%'					, 'Date Today'						, 'Date Today']);
		
		// add the menu to the editor
		editor.ui.addRichCombo('strinsert',
		{
			label: 		'Campos de usuario',
			title: 		'Campos de usuario',
			voiceLabel: 'Campos de usuario',
			className: 	'cke_format',
			multiSelect:false,
			panel:
			{
				css: [ editor.config.contentsCss, CKEDITOR.skin.getPath('editor') ],
				voiceLabel: editor.lang.panelVoiceLabel
			},

			init: function()
			{
				this.startGroup( "Campos de usuario" );
				for (var i in strings)
				{
					this.add(strings[i][0], strings[i][1], strings[i][2]);
				}
			},

			onClick: function( value )
			{
				editor.focus();
				editor.fire( 'saveSnapshot' );
				editor.insertHtml(value);
				editor.fire( 'saveSnapshot' );
			}
		});
	}
});