<?
$subject_val = "Re: [MTT devel] race condition in SCM module";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Feb 18 02:06:30 2011" -->
<!-- isoreceived="20110218070630" -->
<!-- sent="Fri, 18 Feb 2011 09:06:23 +0200" -->
<!-- isosent="20110218070623" -->
<!-- name="Mike Dubman" -->
<!-- email="mike.ompi_at_[hidden]" -->
<!-- subject="Re: [MTT devel] race condition in SCM module" -->
<!-- id="AANLkTinfn=gf97ARzhAMu3Qq=Lr=eNDJO_RRS7qgAZEt_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="F7AF0A05-097C-4208-86E7-F259A68E4FDF_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [MTT devel] race condition in SCM module<br>
<strong>From:</strong> Mike Dubman (<em>mike.ompi_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-02-18 02:06:23
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0557.php">Jeff Squyres: "Re: [MTT devel] race condition in SCM module"</a>
<li><strong>Previous message:</strong> <a href="0555.php">Jeff Squyres: "Re: [MTT devel] race condition in SCM module"</a>
<li><strong>In reply to:</strong> <a href="0555.php">Jeff Squyres: "Re: [MTT devel] race condition in SCM module"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0557.php">Jeff Squyres: "Re: [MTT devel] race condition in SCM module"</a>
<li><strong>Reply:</strong> <a href="0557.php">Jeff Squyres: "Re: [MTT devel] race condition in SCM module"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
1. post_copy fails because does not find some files which should be already
<br>
copied.
<br>
2. In the mtt debug output, (attached in original post) you can see that
<br>
&quot;post_copy&quot; is executed before &quot;copytree&quot; has finished.
<br>
<p><span class="quotelev2">&gt;&gt; copytree running post_copy command:
</span><br>
...
<br>
...
<br>
<p><span class="quotelev2">&gt;&gt; copytree finished copying
</span><br>
<p>On Fri, Feb 18, 2011 at 12:23 AM, Jeff Squyres &lt;jsquyres_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; On Feb 10, 2011, at 2:36 PM, Mike Dubman wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt; &gt; There is a race condition in SCM, Mercurial module when used from MPI GET
</span><br>
<span class="quotelev1">&gt; phase:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; - scm_post_copy hook can be started before MPI GET completed copy of
</span><br>
<span class="quotelev1">&gt; fetched tree into install location.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; How have you verified this?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt; &gt; - This leads to mtt failure, because post_copy starts too early (tree was
</span><br>
<span class="quotelev1">&gt; not copied yet) and fails.
</span><br>
<span class="quotelev2">&gt; &gt; - adding sleeps to post_copy hook - helps.
</span><br>
<span class="quotelev2">&gt; &gt; - does copytree used during mtt get phase have async behave?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; No, it shouldn't.  Everything is serial.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; ---------------- from the mtt -d -v output ---------------------
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; copytree running post_copy command:
</span><br>
<span class="quotelev2">&gt; &gt; ...
</span><br>
<span class="quotelev2">&gt; &gt; ...
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; copytree finished copying
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev1">&gt; ----------------------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Please suggest.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Thanks
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; M
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; mtt-devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; mtt-devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/mtt-devel">http://www.open-mpi.org/mailman/listinfo.cgi/mtt-devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev1">&gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; mtt-devel mailing list
</span><br>
<span class="quotelev1">&gt; mtt-devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/mtt-devel">http://www.open-mpi.org/mailman/listinfo.cgi/mtt-devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/mtt-devel/att-0556/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0557.php">Jeff Squyres: "Re: [MTT devel] race condition in SCM module"</a>
<li><strong>Previous message:</strong> <a href="0555.php">Jeff Squyres: "Re: [MTT devel] race condition in SCM module"</a>
<li><strong>In reply to:</strong> <a href="0555.php">Jeff Squyres: "Re: [MTT devel] race condition in SCM module"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0557.php">Jeff Squyres: "Re: [MTT devel] race condition in SCM module"</a>
<li><strong>Reply:</strong> <a href="0557.php">Jeff Squyres: "Re: [MTT devel] race condition in SCM module"</a>
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
