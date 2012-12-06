# TYPO3 Extension: Direct External Links

A simple TYPO3 Extension that creates links to pages that redirect to external URLs directly to the external URLs.

> Extension Key: directexternallinks  
> Author: b:dreizehn GmbH, 2012  
> Licensed under: GPL 2+

## Introduction
Currently the functionality is quite simple: All frontend links are checked if their doctype equals "3" (= Type is "External URL"). If so, the URLs are resolved directly to the target URL. 

## Set up
Just install the extension and clear the frontend caches.

## ToDo
For future releases, the functionality of this extension could be enabled via TypoScript, so it is available not site-wide, but on a per page-tree basis.