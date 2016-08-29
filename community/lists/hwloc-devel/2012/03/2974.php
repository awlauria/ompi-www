<?
$subject_val = "Re: [hwloc-devel] BGQ empty topology with MPI";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Mar 22 05:58:17 2012" -->
<!-- isoreceived="20120322095817" -->
<!-- sent="Thu, 22 Mar 2012 10:58:10 +0100" -->
<!-- isosent="20120322095810" -->
<!-- name="Brice Goglin" -->
<!-- email="Brice.Goglin_at_[hidden]" -->
<!-- subject="Re: [hwloc-devel] BGQ empty topology with MPI" -->
<!-- id="4F6AF7B2.5030107_at_inria.fr" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="CADcFuaZtN=4rwbM6B_U+6LpHvRCjtL_0t0kPoYyAGU5Jf5+qiQ_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [hwloc-devel] BGQ empty topology with MPI<br>
<strong>From:</strong> Brice Goglin (<em>Brice.Goglin_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-03-22 05:58:10
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2975.php">Samuel Thibault: "Re: [hwloc-devel] BGQ empty topology with MPI"</a>
<li><strong>Previous message:</strong> <a href="2973.php">MPI Team: "[hwloc-devel] Create success (hwloc r1.5a1r4417)"</a>
<li><strong>In reply to:</strong> <a href="2969.php">Daniel Ibanez: "Re: [hwloc-devel] BGQ empty topology with MPI"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2985.php">Christopher Samuel: "Re: [hwloc-devel] BGQ empty topology with MPI"</a>
<li><strong>Reply:</strong> <a href="2985.php">Christopher Samuel: "Re: [hwloc-devel] BGQ empty topology with MPI"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I don't see anything bad in your outputs.
<br>
So there's something strange going on when MPI is added. Which MPI are
<br>
using? Is this a derivative of MPICH that embeds hwloc? (MPICH &gt;= 1.2.1
<br>
if I remember correctly)
<br>
<p>Brice
<br>
<p><p><p>Le 21/03/2012 15:08, Daniel Ibanez a &#195;&#169;crit :
<br>
<span class="quotelev1">&gt; Attached is the stderr and stdout from lstopo compiled as you said.
</span><br>
<span class="quotelev1">&gt; I can't run hwloc-gather-topology.sh on the compute nodes
</span><br>
<span class="quotelev1">&gt; since its a script, but I can run it on the front end node.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Wed, Mar 21, 2012 at 3:36 AM, Samuel Thibault
</span><br>
<span class="quotelev1">&gt; &lt;samuel.thibault_at_[hidden] &lt;mailto:samuel.thibault_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;     Daniel Ibanez, le Wed 21 Mar 2012 03:37:25 +0100, a &#195;&#169;crit :
</span><br>
<span class="quotelev2">&gt;     &gt; Please let me know if theres a hint of what could be causing it,
</span><br>
<span class="quotelev2">&gt;     &gt; where to post, and what info to provide.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;     This is already the proper list.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;     Please attach the output of lstopo after having given the
</span><br>
<span class="quotelev1">&gt;     --enable-debug
</span><br>
<span class="quotelev1">&gt;     option to ./configure and rebuilt completely, to get debugging
</span><br>
<span class="quotelev1">&gt;     output. Also attach the /proc + /sys tarball generated by the
</span><br>
<span class="quotelev1">&gt;     installed
</span><br>
<span class="quotelev1">&gt;     script hwloc-gather-topology.sh.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;     Samuel
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/hwloc-devel/att-2974/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2975.php">Samuel Thibault: "Re: [hwloc-devel] BGQ empty topology with MPI"</a>
<li><strong>Previous message:</strong> <a href="2973.php">MPI Team: "[hwloc-devel] Create success (hwloc r1.5a1r4417)"</a>
<li><strong>In reply to:</strong> <a href="2969.php">Daniel Ibanez: "Re: [hwloc-devel] BGQ empty topology with MPI"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2985.php">Christopher Samuel: "Re: [hwloc-devel] BGQ empty topology with MPI"</a>
<li><strong>Reply:</strong> <a href="2985.php">Christopher Samuel: "Re: [hwloc-devel] BGQ empty topology with MPI"</a>
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