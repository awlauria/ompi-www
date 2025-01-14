<?
$subject_val = "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r27526 - trunk/orte/mca/plm/rsh";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Oct 30 19:12:09 2012" -->
<!-- isoreceived="20121030231209" -->
<!-- sent="Tue, 30 Oct 2012 19:12:04 -0400" -->
<!-- isosent="20121030231204" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r27526 - trunk/orte/mca/plm/rsh" -->
<!-- id="DCE1FEF8-C0E2-48CB-91FB-0743D0694365_at_cisco.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="66DE130A-1C5F-4E19-B293-6D599383DBD7_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r27526 - trunk/orte/mca/plm/rsh<br>
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-10-30 19:12:04
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11691.php">Ralph Castain: "[OMPI devel] 1.7.0rc5"</a>
<li><strong>Previous message:</strong> <a href="11689.php">Nathan Hjelm: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r27526 - trunk/orte/mca/plm/rsh"</a>
<li><strong>In reply to:</strong> <a href="11687.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r27526 - trunk/orte/mca/plm/rsh"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Coolio; thanks for checking into it.
<br>
<p>On Oct 30, 2012, at 4:16 PM, Ralph Castain wrote:
<br>
<p><span class="quotelev1">&gt; Actually, now that I look at it, I'm not sure what Jeff is talking about here is correct. I think Nathan's patch is in fact right.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Nathan's change doesn't in any way impact what gets passed to remote procs. All it does is modify what gets passed on the *orted's* command line. The orted has no idea what OMPI_foo means as an argument on its command line, and I don't think we want to change it.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; In orterun, we do correctly pickup any OMPI_xxx values and add them to the app's envars. This was not changed and will continue to be supported.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; So I think this patch is correct and okay as-is.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Oct 30, 2012, at 12:58 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; I'll fix it, Jeff - the problem is that the plm/rsh was prepending a &quot;-mca&quot; in those cases, when it shouldn't. Nathan's fix is close - I can fix the rest.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Oct 30, 2012, at 12:52 PM, Jeff Squyres &lt;jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; WAIT.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; This contradicts the intent of what I said on the call this morning.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; The point is that any env variable that begins with &quot;OMPI_&quot; is supposed to be propagated out to all the remote processes.  It's a cheap/easy way for users to propagate their env variables to remote nodes (without needing to &quot;mpirun -x&quot; every variable they want to export).  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Specifically, I should be able to do something like this:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -----
</span><br>
<span class="quotelev3">&gt;&gt;&gt; $ hostname
</span><br>
<span class="quotelev3">&gt;&gt;&gt; my_localhost
</span><br>
<span class="quotelev3">&gt;&gt;&gt; $ cat myscript
</span><br>
<span class="quotelev3">&gt;&gt;&gt; :
</span><br>
<span class="quotelev3">&gt;&gt;&gt; echo `hostname`: $OMPI_foo
</span><br>
<span class="quotelev3">&gt;&gt;&gt; $ export OMPI_foo=bar
</span><br>
<span class="quotelev3">&gt;&gt;&gt; $ cat hostfile
</span><br>
<span class="quotelev3">&gt;&gt;&gt; some_remote_host
</span><br>
<span class="quotelev3">&gt;&gt;&gt; $ mpirun --hostfile hostfile -np 1 myscript
</span><br>
<span class="quotelev3">&gt;&gt;&gt; some_remote_host: bar
</span><br>
<span class="quotelev3">&gt;&gt;&gt; $
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -----
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; This behavior has been in OMPI for a long time; please do not take it out.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; If exporting non-MCA OMPI_&lt;foo&gt; env variables causes the problem, then it's a side effect.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Oct 30, 2012, at 3:40 PM, &lt;svn-commit-mailer_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Author: hjelmn (Nathan Hjelm)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Date: 2012-10-30 15:40:04 EDT (Tue, 30 Oct 2012)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; New Revision: 27526
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; URL: <a href="https://svn.open-mpi.org/trac/ompi/changeset/27526">https://svn.open-mpi.org/trac/ompi/changeset/27526</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Log:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; fix bug in plm/rsh that could add extraneous mca options to the orted argv
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; cmr:v1.7
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Text files modified: 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; trunk/orte/mca/plm/rsh/plm_rsh_module.c |     2 +-                                      
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 1 files changed, 1 insertions(+), 1 deletions(-)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Modified: trunk/orte/mca/plm/rsh/plm_rsh_module.c
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; ==============================================================================
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; --- trunk/orte/mca/plm/rsh/plm_rsh_module.c	Tue Oct 30 15:23:15 2012	(r27525)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; +++ trunk/orte/mca/plm/rsh/plm_rsh_module.c	2012-10-30 15:40:04 EDT (Tue, 30 Oct 2012)	(r27526)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; @@ -586,7 +586,7 @@
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;       * only if they aren't already present
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;       */
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;      for (i = 0; NULL != environ[i]; ++i) {
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; -            if (0 == strncmp(&quot;OMPI_&quot;, environ[i], 5)) {
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; +            if (0 == strncmp(&quot;OMPI_MCA&quot;, environ[i], 8)) {
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;              /* check for duplicate in app-&gt;env - this
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;               * would have been placed there by the
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;               * cmd line processor. By convention, we
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; svn-full mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; svn-full_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/svn-full">http://www.open-mpi.org/mailman/listinfo.cgi/svn-full</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -- 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev3">&gt;&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11691.php">Ralph Castain: "[OMPI devel] 1.7.0rc5"</a>
<li><strong>Previous message:</strong> <a href="11689.php">Nathan Hjelm: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r27526 - trunk/orte/mca/plm/rsh"</a>
<li><strong>In reply to:</strong> <a href="11687.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r27526 - trunk/orte/mca/plm/rsh"</a>
<!-- nextthread="start" -->
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
