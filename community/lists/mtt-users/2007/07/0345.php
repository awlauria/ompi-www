<? include("../../include/msg-header.inc"); ?>
<!-- received="Fri Jul  6 16:38:30 2007" -->
<!-- isoreceived="20070706203830" -->
<!-- sent="Fri, 6 Jul 2007 16:39:18 -0400" -->
<!-- isosent="20070706203918" -->
<!-- name="Joshua Hursey" -->
<!-- email="jjhursey_at_[hidden]" -->
<!-- subject="Re: [MTT users] Perl Wrap Error" -->
<!-- id="E608C833-3C79-4420-BFA2-98D7F5C457BF_at_open-mpi.org" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="20070706190457.GA5072_at_sun.com" -->
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
<strong>From:</strong> Joshua Hursey (<em>jjhursey_at_[hidden]</em>)<br>
<strong>Date:</strong> 2007-07-06 16:39:18
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0346.php">Jeff Squyres: "Re: [MTT users] Perl Wrap Error"</a>
<li><strong>Previous message:</strong> <a href="0344.php">Ethan Mallove: "Re: [MTT users] Perl Wrap Error"</a>
<li><strong>In reply to:</strong> <a href="0344.php">Ethan Mallove: "Re: [MTT users] Perl Wrap Error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0346.php">Jeff Squyres: "Re: [MTT users] Perl Wrap Error"</a>
<li><strong>Reply:</strong> <a href="0346.php">Jeff Squyres: "Re: [MTT users] Perl Wrap Error"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
That seemed to have done the trick.
<br>
<p>Thanks,
<br>
Josh
<br>
<p>On Jul 6, 2007, at 3:04 PM, Ethan Mallove wrote:
<br>
<p><span class="quotelev1">&gt; On Fri, Jul/06/2007 01:22:06PM, Joshua Hursey wrote:
</span><br>
<span class="quotelev2">&gt;&gt; Anyone seen the following error from MTT before? It looks like it  
</span><br>
<span class="quotelev2">&gt;&gt; is in the
</span><br>
<span class="quotelev2">&gt;&gt; reporter stage.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &lt;-------------------------&gt;
</span><br>
<span class="quotelev2">&gt;&gt; shell$ /spin/home/jjhursey/testing/mtt//client/mtt --mpi-install   
</span><br>
<span class="quotelev2">&gt;&gt; --scratch
</span><br>
<span class="quotelev2">&gt;&gt; /spin/home/jjhursey/testing/scratch/20070706 --file
</span><br>
<span class="quotelev2">&gt;&gt; /spin/home/jjhursey/testing/etc/jaguar/simple-svn.ini --print-time
</span><br>
<span class="quotelev2">&gt;&gt; --verbose --debug 2&gt;&amp;1 1&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; /spin/home/jjhursey/testing/scratch/20070706/output.txt
</span><br>
<span class="quotelev2">&gt;&gt; This shouldn't happen at /usr/lib/perl5/5.8.3/Text/Wrap.pm line 64.
</span><br>
<span class="quotelev2">&gt;&gt; shell$
</span><br>
<span class="quotelev2">&gt;&gt; &lt;-------------------------&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; &quot;This shouldn't happen at ...&quot; is the die message?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Try this INI [Reporter: TextFile] section:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; {{{
</span><br>
<span class="quotelev1">&gt;   [Reporter: text file backup]
</span><br>
<span class="quotelev1">&gt;   module = TextFile
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   textfile_filename = $phase-$section-$mpi_name-$mpi_version.txt
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   # User-defined report headers/footers
</span><br>
<span class="quotelev1">&gt;   textfile_summary_header = &lt;&lt;EOT
</span><br>
<span class="quotelev1">&gt;   hostname: &amp;shell(&quot;hostname&quot;)
</span><br>
<span class="quotelev1">&gt;   uname: &amp;shell(&quot;uname -a&quot;)
</span><br>
<span class="quotelev1">&gt;   who am i: &amp;shell(&quot;who am i&quot;)
</span><br>
<span class="quotelev1">&gt;   EOT
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   textfile_summary_footer =
</span><br>
<span class="quotelev1">&gt;   textfile_detail_header  =
</span><br>
<span class="quotelev1">&gt;   textfile_detail_footer  =
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   textfile_textwrap = 78
</span><br>
<span class="quotelev1">&gt; }}}
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Ethan
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; The return code is: 6400
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I attached the output log incase that helps, and the INI file.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; -- Josh
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; mtt-users mailing list
</span><br>
<span class="quotelev1">&gt; mtt-users_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/mtt-users">http://www.open-mpi.org/mailman/listinfo.cgi/mtt-users</a>
</span><br>
<p><pre>
----
Josh Hursey
jjhursey_at_[hidden]
<a href="http://www.open-mpi.org/">http://www.open-mpi.org/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0346.php">Jeff Squyres: "Re: [MTT users] Perl Wrap Error"</a>
<li><strong>Previous message:</strong> <a href="0344.php">Ethan Mallove: "Re: [MTT users] Perl Wrap Error"</a>
<li><strong>In reply to:</strong> <a href="0344.php">Ethan Mallove: "Re: [MTT users] Perl Wrap Error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0346.php">Jeff Squyres: "Re: [MTT users] Perl Wrap Error"</a>
<li><strong>Reply:</strong> <a href="0346.php">Jeff Squyres: "Re: [MTT users] Perl Wrap Error"</a>
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
