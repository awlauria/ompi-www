<?
$subject_val = "Re: [hwloc-users] bind process to built cpuset";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Feb 21 06:19:05 2012" -->
<!-- isoreceived="20120221111905" -->
<!-- sent="Tue, 21 Feb 2012 11:18:57 +0000" -->
<!-- isosent="20120221111857" -->
<!-- name="Albert Solernou" -->
<!-- email="albert.solernou_at_[hidden]" -->
<!-- subject="Re: [hwloc-users] bind process to built cpuset" -->
<!-- id="4F437DA1.2090304_at_oerc.ox.ac.uk" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="4F436806.5020701_at_oerc.ox.ac.uk" -->
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
<strong>Subject:</strong> Re: [hwloc-users] bind process to built cpuset<br>
<strong>From:</strong> Albert Solernou (<em>albert.solernou_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-02-21 06:18:57
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0562.php">Brice Goglin: "Re: [hwloc-users] bind process to built cpuset"</a>
<li><strong>Previous message:</strong> <a href="0560.php">Albert Solernou: "Re: [hwloc-users] bind process to built cpuset"</a>
<li><strong>In reply to:</strong> <a href="0560.php">Albert Solernou: "Re: [hwloc-users] bind process to built cpuset"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0562.php">Brice Goglin: "Re: [hwloc-users] bind process to built cpuset"</a>
<li><strong>Reply:</strong> <a href="0562.php">Brice Goglin: "Re: [hwloc-users] bind process to built cpuset"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Hi, 
<br>
I just tried it and it works nicely!
<br>
<p>I didn't tried it myself because the documentation of the library 
<br>
states that two of the arguments in hwloc_bitmap_or are 
<br>
hwloc_const_bitmap_t. However, in your approach only one of  them is 
<br>
constant. Anyway, it is working now.
<br>
<p>Best,
<br>
Albert
<br>
<p>On Tue 21 Feb 2012 09:46:46 GMT, Albert Solernou wrote:
<br>
<span class="quotelev1">&gt; Thank you very much, Brice!
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Best,
</span><br>
<span class="quotelev1">&gt; Albert
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Mon 20 Feb 2012 18:09:55 GMT, Brice Goglin wrote:
</span><br>
<span class="quotelev2">&gt;&gt; Le 20/02/2012 19:06, Brice Goglin a &#195;&#169;crit :
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Le 20/02/2012 17:41, Albert Solernou a &#195;&#169;crit :
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Hi,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I'd like to bind a process to a cpuset, so that when it spawns on
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; several threads, those are trapped on that cpuset.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; In order to do so, I want to define my own cpuset. Let's say I want it
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; to include HWLOC_OBJ_CORE 2 and 5. How can I create this cpuset? The
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; bitmap api sounds like the solution to me, but I couldn't relate the
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; indexes in there into HWLOC_OBJects of any type...
</span><br>
<span class="quotelev3">&gt;&gt;&gt; If you want to bind to cores #2 and #5, do:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; hwloc_bitmap_t cpuset;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; hwloc_obj_t core1, core2;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; core1 = hwloc_get_obj_by_type(topology, HWLOC_OBJ_CORE, 2);
</span><br>
<span class="quotelev3">&gt;&gt;&gt; if (!core1)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;      error...
</span><br>
<span class="quotelev3">&gt;&gt;&gt; core2 = hwloc_get_obj_by_type(topology, HWLOC_OBJ_CORE, 5);
</span><br>
<span class="quotelev3">&gt;&gt;&gt; if (!core2)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;      error...
</span><br>
<span class="quotelev3">&gt;&gt;&gt; cpuset = hwloc_bitmap_alloc();
</span><br>
<span class="quotelev3">&gt;&gt;&gt; if (!cpuset);
</span><br>
<span class="quotelev3">&gt;&gt;&gt;      error...
</span><br>
<span class="quotelev3">&gt;&gt;&gt; hwloc_bitmap_or(cpuset, cpuset, core1-&gt;cpuset);
</span><br>
<span class="quotelev3">&gt;&gt;&gt; hwloc_bitmap_or(cpuset, cpuset, core2-&gt;cpuset);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; By the way, alloc()+or() can be optimized as dup():
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; cpuset = hwloc_bitmap_dup(core1-&gt;cpuset);
</span><br>
<span class="quotelev2">&gt;&gt; if (!cpuset)
</span><br>
<span class="quotelev2">&gt;&gt;      error...
</span><br>
<span class="quotelev2">&gt;&gt; hwloc_bitmap_or(cpuset, cpuset, core2-&gt;cpuset);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Brice
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; hwloc-users mailing list
</span><br>
<span class="quotelev2">&gt;&gt; hwloc-users_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-users">http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-users</a>
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; hwloc-users mailing list
</span><br>
<span class="quotelev1">&gt; hwloc-users_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-users">http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-users</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0562.php">Brice Goglin: "Re: [hwloc-users] bind process to built cpuset"</a>
<li><strong>Previous message:</strong> <a href="0560.php">Albert Solernou: "Re: [hwloc-users] bind process to built cpuset"</a>
<li><strong>In reply to:</strong> <a href="0560.php">Albert Solernou: "Re: [hwloc-users] bind process to built cpuset"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0562.php">Brice Goglin: "Re: [hwloc-users] bind process to built cpuset"</a>
<li><strong>Reply:</strong> <a href="0562.php">Brice Goglin: "Re: [hwloc-users] bind process to built cpuset"</a>
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
