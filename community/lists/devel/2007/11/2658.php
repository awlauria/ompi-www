<?
$subject_val = "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16762";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Nov 20 22:11:32 2007" -->
<!-- isoreceived="20071121031132" -->
<!-- sent="Tue, 20 Nov 2007 22:11:26 -0500" -->
<!-- isosent="20071121031126" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16762" -->
<!-- id="05B54451-31F8-475D-8880-6E5333FB1E7F_at_cisco.com" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="200711210310.lAL3A7UJ027524_at_sourcehaven.osl.iu.edu" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16762<br>
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2007-11-20 22:11:26
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2659.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16762"</a>
<li><strong>Previous message:</strong> <a href="2657.php">Terry Dontje: "[OMPI devel] OMPI Bug Status"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2659.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16762"</a>
<li><strong>Reply:</strong> <a href="2659.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16762"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
George --
<br>
<p>I assume that this needs to go to 1.2.5 as well, right?  Can you file  
<br>
a CMR?
<br>
<p><p>On Nov 20, 2007, at 10:10 PM, bosilca_at_[hidden] wrote:
<br>
<p><span class="quotelev1">&gt; Author: bosilca
</span><br>
<span class="quotelev1">&gt; Date: 2007-11-20 22:10:05 EST (Tue, 20 Nov 2007)
</span><br>
<span class="quotelev1">&gt; New Revision: 16762
</span><br>
<span class="quotelev1">&gt; URL: <a href="https://svn.open-mpi.org/trac/ompi/changeset/16762">https://svn.open-mpi.org/trac/ompi/changeset/16762</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Log:
</span><br>
<span class="quotelev1">&gt; After the 10.5.1 update this bug is still valid. Remove the -g from  
</span><br>
<span class="quotelev1">&gt; all
</span><br>
<span class="quotelev1">&gt; Leopard versions (until they fix it).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Text files modified:
</span><br>
<span class="quotelev1">&gt;   trunk/config/ompi_config_asm.m4 |     2 +-
</span><br>
<span class="quotelev1">&gt;   1 files changed, 1 insertions(+), 1 deletions(-)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Modified: trunk/config/ompi_config_asm.m4
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; ======================================================================
</span><br>
<span class="quotelev1">&gt; --- trunk/config/ompi_config_asm.m4	(original)
</span><br>
<span class="quotelev1">&gt; +++ trunk/config/ompi_config_asm.m4	2007-11-20 22:10:05 EST (Tue, 20  
</span><br>
<span class="quotelev1">&gt; Nov 2007)
</span><br>
<span class="quotelev1">&gt; @@ -809,7 +809,7 @@
</span><br>
<span class="quotelev1">&gt;     OMPI_VAR_SCOPE_PUSH([ompi_config_asm_flags_new  
</span><br>
<span class="quotelev1">&gt; ompi_config_asm_flag])
</span><br>
<span class="quotelev1">&gt;     AC_MSG_CHECKING([if need to remove -g from CCASFLAGS])
</span><br>
<span class="quotelev1">&gt;     case &quot;$host&quot; in
</span><br>
<span class="quotelev1">&gt; -        *-apple-darwin9.0*)
</span><br>
<span class="quotelev1">&gt; +        *-apple-darwin9.*)
</span><br>
<span class="quotelev1">&gt;             for ompi_config_asm_flag in $CCASFLAGS; do
</span><br>
<span class="quotelev1">&gt;                 if test &quot;$ompi_config_asm_flag&quot; != &quot;-g&quot;; then
</span><br>
<span class="quotelev1">&gt;                      
</span><br>
<span class="quotelev1">&gt; ompi_config_asm_flags_new=&quot;$ompi_config_asm_flags_new  
</span><br>
<span class="quotelev1">&gt; $ompi_config_asm_flag&quot;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; svn-full mailing list
</span><br>
<span class="quotelev1">&gt; svn-full_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/svn-full">http://www.open-mpi.org/mailman/listinfo.cgi/svn-full</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
Cisco Systems
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2659.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16762"</a>
<li><strong>Previous message:</strong> <a href="2657.php">Terry Dontje: "[OMPI devel] OMPI Bug Status"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2659.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16762"</a>
<li><strong>Reply:</strong> <a href="2659.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16762"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
