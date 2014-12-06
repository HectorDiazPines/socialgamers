/**
 * 
 */
$ ( "# dp2" ). datepicker ({ 
 viewMode :  'años' , 
 formato :  "dd / mm / aaaa ' 
});

$ ( '# dp2' ). en ( 'CHANGEDATE' ,  la función  ( ev )  { 
   // cerca cuando viewMode = "0" (días) 
   si ( ev . viewMode ===  'día' ) { 
      $ ( '# dp2' ). datepicker ( 'ocultar' ); 
   } 
})