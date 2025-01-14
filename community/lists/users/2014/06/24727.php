<?
$subject_val = "Re: [OMPI users] Problem moving from 1.4 to 1.6";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Jun 27 15:41:58 2014" -->
<!-- isoreceived="20140627194158" -->
<!-- sent="Fri, 27 Jun 2014 12:41:54 -0700" -->
<!-- isosent="20140627194154" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI users] Problem moving from 1.4 to 1.6" -->
<!-- id="58B39D55-78D5-482F-A079-0B3B9263F82D_at_open-mpi.org" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="OFD17A78AF.85C30A44-ON85257D04.005C1A58-85257D04.005CCB25_at_notes.aero.org" -->
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
<strong>Subject:</strong> Re: [OMPI users] Problem moving from 1.4 to 1.6<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-06-27 15:41:54
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="24728.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Problem moving from 1.4 to 1.6"</a>
<li><strong>Previous message:</strong> <a href="24726.php">Gus Correa: "Re: [OMPI users] Problem moving from 1.4 to 1.6"</a>
<li><strong>In reply to:</strong> <a href="24721.php">Jeffrey A Cummings: "[OMPI users] Problem moving from 1.4 to 1.6"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="24728.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Problem moving from 1.4 to 1.6"</a>
<li><strong>Reply:</strong> <a href="24728.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Problem moving from 1.4 to 1.6"</a>
<li><strong>Reply:</strong> <a href="24731.php">Jeffrey A Cummings: "Re: [OMPI users] Problem moving from 1.4 to 1.6"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Let me steer you on a different course. Can you run &quot;ompi_info&quot; and paste the output here? It looks to me like someone installed a version that includes uDAPL support, so you may have to disable some additional things to get it to run.
<br>
<p><p>On Jun 27, 2014, at 9:53 AM, Jeffrey A Cummings &lt;Jeffrey.A.Cummings_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; We have recently upgraded our cluster to a version of Linux which comes with openMPI version 1.6.2. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; An application which ran previously (using some version of 1.4) now errors out with the following messages: 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;         librdmacm: Fatal: no RDMA devices found 
</span><br>
<span class="quotelev1">&gt;         librdmacm: Fatal: no RDMA devices found 
</span><br>
<span class="quotelev1">&gt;         librdmacm: Fatal: no RDMA devices found 
</span><br>
<span class="quotelev1">&gt;         -------------------------------------------------------------------------- 
</span><br>
<span class="quotelev1">&gt;         WARNING: Failed to open &quot;OpenIB-cma&quot; [DAT_INTERNAL_ERROR:]. 
</span><br>
<span class="quotelev1">&gt;         This may be a real error or it may be an invalid entry in the uDAPL 
</span><br>
<span class="quotelev1">&gt;         Registry which is contained in the dat.conf file. Contact your local 
</span><br>
<span class="quotelev1">&gt;         System Administrator to confirm the availability of the interfaces in 
</span><br>
<span class="quotelev1">&gt;         the dat.conf file. 
</span><br>
<span class="quotelev1">&gt;         -------------------------------------------------------------------------- 
</span><br>
<span class="quotelev1">&gt;         [tupile:25363] 2 more processes have sent help message help-mpi-btl-udapl.txt / dat_ia_open fail 
</span><br>
<span class="quotelev1">&gt;         [tupile:25363] Set MCA parameter &quot;orte_base_help_aggregate&quot; to 0 to see all help / error messages 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; The mpirun command line contains the argument '--mca btl ^openib', which I thought told mpi to not look for the ib interface. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Can anyone suggest what the problem might be?  Did the relevant syntax change between versions 1.4 and 1.6? 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Jeffrey A. Cummings
</span><br>
<span class="quotelev1">&gt; Engineering Specialist
</span><br>
<span class="quotelev1">&gt; Performance Modeling and Analysis Department
</span><br>
<span class="quotelev1">&gt; Systems Analysis and Simulation Subdivision
</span><br>
<span class="quotelev1">&gt; Systems Engineering Division
</span><br>
<span class="quotelev1">&gt; Engineering and Technology Group
</span><br>
<span class="quotelev1">&gt; The Aerospace Corporation
</span><br>
<span class="quotelev1">&gt; 571-307-4220
</span><br>
<span class="quotelev1">&gt; jeffrey.a.cummings_at_[hidden] 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; users mailing list
</span><br>
<span class="quotelev1">&gt; users_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2014/06/24721.php">http://www.open-mpi.org/community/lists/users/2014/06/24721.php</a>
</span><br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/users/att-24727/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="24728.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Problem moving from 1.4 to 1.6"</a>
<li><strong>Previous message:</strong> <a href="24726.php">Gus Correa: "Re: [OMPI users] Problem moving from 1.4 to 1.6"</a>
<li><strong>In reply to:</strong> <a href="24721.php">Jeffrey A Cummings: "[OMPI users] Problem moving from 1.4 to 1.6"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="24728.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Problem moving from 1.4 to 1.6"</a>
<li><strong>Reply:</strong> <a href="24728.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Problem moving from 1.4 to 1.6"</a>
<li><strong>Reply:</strong> <a href="24731.php">Jeffrey A Cummings: "Re: [OMPI users] Problem moving from 1.4 to 1.6"</a>
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
