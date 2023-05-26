@echo off

SET fileName=%1
SET createModel=true
SET createView=true

IF "%fileName%"=="" (
  echo Error: Missing name
  exit /b
)

IF "%~2"=="-false" (
    SET createModel= false
)

IF "%~3"=="-false" (
    SET createView= false
)

SET className=%fileName%
cd "app\controllers\"
For /f %%A in ('
  Powershell -NoP -C "$Env:fileName.Substring(0,1).ToUpper()+$Env:fileName.Substring(1).ToLower()"
') do set className=%%A

IF "%createModel%"=="true" (
  REM Creating controller file
  echo ^<?php > %fileName%.controller.php
  echo class %className%Controller extends Controller >> %fileName%.controller.php
  echo ^{ >> %fileName%.controller.php
  echo    function __construct^(^) >> %fileName%.controller.php
  echo    { >> %fileName%.controller.php
  echo        ^$this-^>loadModel^(^); >> %fileName%.controller.php
  echo    } >> %fileName%.controller.php
  echo    function index^(^) >> %fileName%.controller.php
  echo    { >> %fileName%.controller.php
  echo        ^$this-^>view^(^); >> %fileName%.controller.php
  echo    } >> %fileName%.controller.php
  echo ^} >> %fileName%.controller.php
  echo Successfully created controller
) ELSE (
  REM Creating controller file
  echo ^<?php > %fileName%.controller.php
  echo class %className%Controller extends Controller >> %fileName%.controller.php
  echo ^{ >> %fileName%.controller.php 
  echo    function index^(^) >> %fileName%.controller.php
  echo    { >> %fileName%.controller.php
  echo        ^$this-^>view^(^); >> %fileName%.controller.php
  echo    } >> %fileName%.controller.php
  echo ^} >> %fileName%.controller.php
  echo Successfully created controller
)


IF "%createModel%"=="true" (
  REM Creating model file
  cd ".."
  cd "models/"
  echo ^<?php > %fileName%.model.php
  echo class %className%Model extends Model >> %fileName%.model.php
  echo ^{ >> %fileName%.model.php
  echo    function __construct ^(^) >>%fileName%.model.php
  echo    { >> %fileName%.model.php
  echo        //^$this-^>loadDatabase^(^); >> %fileName%.model.php
  echo    } >> %fileName%.model.php
  echo ^} >> %fileName%.model.php

  echo Successfully created model
)

IF "%createView%"=="true" (
  REM Creating view file
  cd ".."
  cd "views/"
  mkdir %fileName%
  cd %fileName%
  echo %fileName% > index.php

  echo Successfully created view

)

