<?
$subject_val = "Re: [OMPI users] Related to project ideas in OpenMPI";
include("../../include/msg-header.inc");
?>
<!-- received="Sat Aug 27 10:30:07 2011" -->
<!-- isoreceived="20110827143007" -->
<!-- sent="Sat, 27 Aug 2011 10:30:01 -0400" -->
<!-- isosent="20110827143001" -->
<!-- name="Joshua Hursey" -->
<!-- email="jjhursey_at_[hidden]" -->
<!-- subject="Re: [OMPI users] Related to project ideas in OpenMPI" -->
<!-- id="FE332FF8-4396-456F-884B-6B1D534E5FC6_at_open-mpi.org" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="206C9AEA-9768-427C-A353-46F5A4F050E0_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI users] Related to project ideas in OpenMPI<br>
<strong>From:</strong> Joshua Hursey (<em>jjhursey_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-08-27 10:30:01
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17116.php">Ralph Castain: "Re: [OMPI users] How to add nodes while running job"</a>
<li><strong>Previous message:</strong> <a href="17114.php">Rayson Ho: "Re: [OMPI users] How to add nodes while running job"</a>
<li><strong>In reply to:</strong> <a href="17111.php">Ralph Castain: "Re: [OMPI users] Related to project ideas in OpenMPI"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17117.php">Ralph Castain: "Re: [OMPI users] Related to project ideas in OpenMPI"</a>
<li><strong>Reply:</strong> <a href="17117.php">Ralph Castain: "Re: [OMPI users] Related to project ideas in OpenMPI"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
There is a 'self' checkpointer (CRS component) that does application level checkpointing - exposed at the MPI level. I don't know how different what you are working on is, but maybe something like that could be harnessed. Note that I have not tested the 'self' checkpointer with the process migration support, it -should- work, but there might be some bugs to work out.
<br>
<p>Documentation and examples at the link below:
<br>
&nbsp;&nbsp;<a href="http://osl.iu.edu/research/ft/ompi-cr/examples.php#example-self">http://osl.iu.edu/research/ft/ompi-cr/examples.php#example-self</a>
<br>
<p>-- Josh
<br>
<p>On Aug 26, 2011, at 6:17 PM, Ralph Castain wrote:
<br>
<p><span class="quotelev1">&gt; FWIW: I'm in the process of porting some code from a branch that allows apps to do on-demand checkpoint/recovery style operations at the app level. Specifically, it provides the ability to:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; * request a &quot;recovery image&quot; - an application-level blob containing state info required for the app to recover its state.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; * register a callback point for providing a &quot;recovery image&quot;, either to store for later use (separate API is used to indicate when to acquire it) or to provide to another process upon request
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; This is at the RTE level, so someone would have to expose it via an appropriate MPI call if someone wants to use it at that layer (I'm open to changes to support that use, if someone is interested).
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Aug 26, 2011, at 3:16 PM, Josh Hursey wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; There are some great comments in this thread. Process migration (like
</span><br>
<span class="quotelev2">&gt;&gt; many topics in systems) can get complex fast.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; The Open MPI process migration implementation is checkpoint/restart
</span><br>
<span class="quotelev2">&gt;&gt; based (currently using BLCR), and uses an 'eager' style of migration.
</span><br>
<span class="quotelev2">&gt;&gt; This style of migration stops a process completely on the source
</span><br>
<span class="quotelev2">&gt;&gt; machine, checkpoints/terminates it, restarts it on the destination
</span><br>
<span class="quotelev2">&gt;&gt; machine, then rejoins it with the other running processes. I think the
</span><br>
<span class="quotelev2">&gt;&gt; only documentation that we have is at the webpage below (and my PhD
</span><br>
<span class="quotelev2">&gt;&gt; thesis, if you want the finer details):
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://osl.iu.edu/research/ft/ompi-cr/">http://osl.iu.edu/research/ft/ompi-cr/</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; We have wanted to experiment with a 'pre-copy' or 'live' migration
</span><br>
<span class="quotelev2">&gt;&gt; style, but have not had the necessary support from the underlying
</span><br>
<span class="quotelev2">&gt;&gt; checkpointer or time to devote to making it happen. I think BLCR is
</span><br>
<span class="quotelev2">&gt;&gt; working on including the necessary pieces in a future release (there
</span><br>
<span class="quotelev2">&gt;&gt; are papers where a development version of BLCR has done this with
</span><br>
<span class="quotelev2">&gt;&gt; LAM/MPI). So that might be something of interest.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Process migration techniques can benefit from fault prediction and
</span><br>
<span class="quotelev2">&gt;&gt; 'good' target destination selection. Fault prediction allows us to
</span><br>
<span class="quotelev2">&gt;&gt; move processes away from soon-to-fail locations, but it can be
</span><br>
<span class="quotelev2">&gt;&gt; difficult to accurately predict failures. Open MPI has some hooks in
</span><br>
<span class="quotelev2">&gt;&gt; the runtime layer that support 'sensors' which might help here. Good
</span><br>
<span class="quotelev2">&gt;&gt; target destination selection is equally complex, but the idea here is
</span><br>
<span class="quotelev2">&gt;&gt; to move processes to a machine where they can continue supporting the
</span><br>
<span class="quotelev2">&gt;&gt; efficient execution of the application. So this might mean moving to
</span><br>
<span class="quotelev2">&gt;&gt; the least loaded machine, or moving to a machine with other processes
</span><br>
<span class="quotelev2">&gt;&gt; to reduce interprocess communication (something like dynamic load
</span><br>
<span class="quotelev2">&gt;&gt; balancing).
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; So there are some ideas to get you started.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; -- Josh
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Thu, Aug 25, 2011 at 12:06 PM, Rayson Ho &lt;raysonlogin_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Don't know which SSI project you are referring to... I only know the
</span><br>
<span class="quotelev3">&gt;&gt;&gt; OpenSSI project, and I was one of the first who subscribed to its
</span><br>
<span class="quotelev3">&gt;&gt;&gt; mailing list (since 2001).
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://openssi.org/cgi-bin/view?page=openssi.html">http://openssi.org/cgi-bin/view?page=openssi.html</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I don't think those OpenSSI clusters are designed for tens of
</span><br>
<span class="quotelev3">&gt;&gt;&gt; thousands of nodes, and not sure if it scales well to even a thousand
</span><br>
<span class="quotelev3">&gt;&gt;&gt; nodes -- so IMO they have limited use for HPC clusters.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Rayson
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Thu, Aug 25, 2011 at 11:45 AM, Durga Choudhury &lt;dpchoudh_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Also, in 2005 there was an attempt to implement SSI (Single System
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Image) functionality to the then-current 2.6.10 kernel. The proposal
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; was very detailed and covered most of the bases of task creation, PID
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; allocation etc across a loosely tied cluster (without using fancy
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; hardware such as RDMA fabric). Anybody knows if it was ever
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; implemented? Any pointers in this direction?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Thanks and regards
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Durga
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Thu, Aug 25, 2011 at 11:08 AM, Rayson Ho &lt;raysonlogin_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Srinivas,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; There's also Kernel-Level Checkpointing vs. User-Level Checkpointing -
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; if you can checkpoint an MPI task and restart it on a new node, then
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; this is also &quot;process migration&quot;.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Of course, doing a checkpoint &amp; restart can be slower than pure
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; in-kernel process migration, but the advantage is that you don't need
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; any kernel support, and can in fact do all of it in user-space.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Rayson
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Thu, Aug 25, 2011 at 10:26 AM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; It also depends on what part of migration interests you - are you wanting to look at the MPI part of the problem (reconnecting MPI transports, ensuring messages are not lost, etc.) or the RTE part of the problem (where to restart processes, detecting failures, etc.)?
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; On Aug 24, 2011, at 7:04 AM, Jeff Squyres wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Be aware that process migration is a pretty complex issue.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Josh is probably the best one to answer your question directly, but he's out today.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; On Aug 24, 2011, at 5:45 AM, srinivas kundaram wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; I am final year grad student looking for my final year project in OpenMPI.We are group of 4 students.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; I wanted to know about the &quot;Process Migration&quot; process of MPI processes in OpenMPI.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Can anyone suggest me any ideas for project related to process migration in OenMPI or other topics in Systems.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; regards,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Srinivas Kundaram
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; srinu1034_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; +91-8149399160
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; For corporate legal information go to:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Rayson
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ==================================================
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Open Grid Scheduler - The Official Open Source Grid Engine
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://gridscheduler.sourceforge.net/">http://gridscheduler.sourceforge.net/</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Rayson
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ==================================================
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Open Grid Scheduler - The Official Open Source Grid Engine
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://gridscheduler.sourceforge.net/">http://gridscheduler.sourceforge.net/</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; -- 
</span><br>
<span class="quotelev2">&gt;&gt; Joshua Hursey
</span><br>
<span class="quotelev2">&gt;&gt; Postdoctoral Research Associate
</span><br>
<span class="quotelev2">&gt;&gt; Oak Ridge National Laboratory
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://users.nccs.gov/~jjhursey">http://users.nccs.gov/~jjhursey</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; users mailing list
</span><br>
<span class="quotelev2">&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; users mailing list
</span><br>
<span class="quotelev1">&gt; users_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17116.php">Ralph Castain: "Re: [OMPI users] How to add nodes while running job"</a>
<li><strong>Previous message:</strong> <a href="17114.php">Rayson Ho: "Re: [OMPI users] How to add nodes while running job"</a>
<li><strong>In reply to:</strong> <a href="17111.php">Ralph Castain: "Re: [OMPI users] Related to project ideas in OpenMPI"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17117.php">Ralph Castain: "Re: [OMPI users] Related to project ideas in OpenMPI"</a>
<li><strong>Reply:</strong> <a href="17117.php">Ralph Castain: "Re: [OMPI users] Related to project ideas in OpenMPI"</a>
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
