<?
$subject_val = "Re: [hwloc-devel] xml file load incompatibilities";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Sep 20 18:00:01 2013" -->
<!-- isoreceived="20130920220001" -->
<!-- sent="Fri, 20 Sep 2013 23:59:58 +0200" -->
<!-- isosent="20130920215958" -->
<!-- name="Brice Goglin" -->
<!-- email="Brice.Goglin_at_[hidden]" -->
<!-- subject="Re: [hwloc-devel] xml file load incompatibilities" -->
<!-- id="523CC55E.80007_at_inria.fr" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="AF0473FB-A400-4742-B1D0-3F284C7AFBBF_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [hwloc-devel] xml file load incompatibilities<br>
<strong>From:</strong> Brice Goglin (<em>Brice.Goglin_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-09-20 17:59:58
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3884.php">Ralph Castain: "Re: [hwloc-devel] xml file load incompatibilities"</a>
<li><strong>Previous message:</strong> <a href="3882.php">Ralph Castain: "Re: [hwloc-devel] xml file load incompatibilities"</a>
<li><strong>In reply to:</strong> <a href="3882.php">Ralph Castain: "Re: [hwloc-devel] xml file load incompatibilities"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="3884.php">Ralph Castain: "Re: [hwloc-devel] xml file load incompatibilities"</a>
<li><strong>Reply:</strong> <a href="3884.php">Ralph Castain: "Re: [hwloc-devel] xml file load incompatibilities"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I can't see any segfault. Where does the segfault occurs for you? In
<br>
OMPI only (or lstopo too)? When loading or when using the topology?
<br>
<p>I tried lstopo on that file with and without HWLOC_NO_LIBXML_IMPORT=1
<br>
(in case the bug is in one of XML backends), looks ok.
<br>
<p>Brice
<br>
<p><p><p><p><p>Le 20/09/2013 23:53, Ralph Castain a &#233;crit :
<br>
<span class="quotelev1">&gt; Here are the two files I tried - not from the same machine. The foo.xml works, the topo.xml segfaults
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; One of our users reported it from their machine, but I don't have their topo file.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Sep 20, 2013, at 2:41 PM, Brice Goglin &lt;Brice.Goglin_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Hello,
</span><br>
<span class="quotelev2">&gt;&gt; I don't see anything reason for such an incompatibility. But there are
</span><br>
<span class="quotelev2">&gt;&gt; many combinations, we can't test everything.
</span><br>
<span class="quotelev2">&gt;&gt; I can't reproduce that on my machines. Can you send the XML output of
</span><br>
<span class="quotelev2">&gt;&gt; both versions on one of your machines?
</span><br>
<span class="quotelev2">&gt;&gt; Brice
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Le 20/09/2013 23:32, Ralph Castain a &#233;crit :
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Hi folks
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I've run across a rather strange behavior. We have two branches in OMPI - the devel trunk (using hwloc v1.7.2) and our feature release series (using hwloc 1.5.2). I have found the following:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; *the feature series can correctly load an xml file generated by lstopo of versions 1.5 or greater
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; * the devel series can correctly load an xml file generated by lstopo of versions 1.7 or greater, but not files generated by prior versions. In the latter case, I segfault as soon as I try to use the loaded topology.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Any ideas why the discrepancy? Can I at least detect the version used to create a file when loading it so I can error out instead of segfaulting?
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Ralph
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; hwloc-devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; hwloc-devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel">http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; hwloc-devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; hwloc-devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel">http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; hwloc-devel mailing list
</span><br>
<span class="quotelev1">&gt; hwloc-devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel">http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel</a>
</span><br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/hwloc-devel/att-3883/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3884.php">Ralph Castain: "Re: [hwloc-devel] xml file load incompatibilities"</a>
<li><strong>Previous message:</strong> <a href="3882.php">Ralph Castain: "Re: [hwloc-devel] xml file load incompatibilities"</a>
<li><strong>In reply to:</strong> <a href="3882.php">Ralph Castain: "Re: [hwloc-devel] xml file load incompatibilities"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="3884.php">Ralph Castain: "Re: [hwloc-devel] xml file load incompatibilities"</a>
<li><strong>Reply:</strong> <a href="3884.php">Ralph Castain: "Re: [hwloc-devel] xml file load incompatibilities"</a>
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