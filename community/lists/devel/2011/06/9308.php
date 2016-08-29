<?
$subject_val = "Re: [OMPI devel] RFC: Resilient ORTE";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Jun  7 10:51:54 2011" -->
<!-- isoreceived="20110607145154" -->
<!-- sent="Tue, 7 Jun 2011 10:51:48 -0400" -->
<!-- isosent="20110607145148" -->
<!-- name="Josh Hursey" -->
<!-- email="jjhursey_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: Resilient ORTE" -->
<!-- id="BANLkTimBz732qytJ7o62h6ydZE516UXfrg_at_mail.gmail.com" -->
<!-- charset="windows-1252" -->
<!-- inreplyto="84DD1C22CA5747969A0BC629BD09D4B0_at_gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: Resilient ORTE<br>
<strong>From:</strong> Josh Hursey (<em>jjhursey_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-06-07 10:51:48
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9309.php">Jeff Squyres: "Re: [OMPI devel] VT support for 1.5"</a>
<li><strong>Previous message:</strong> <a href="9307.php">Wesley Bland: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<li><strong>In reply to:</strong> <a href="9307.php">Wesley Bland: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9322.php">Josh Hursey: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<li><strong>Reply:</strong> <a href="9322.php">Josh Hursey: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I briefly looked over the patch. Excluding the epochs (which we don't
<br>
need now, but will soon) it looks similar to what I have setup on my
<br>
MPI run-through stabilization branch - so it should support that work
<br>
nicely. I'll try to test it this week and send back any other
<br>
comments.
<br>
<p>Good work.
<br>
<p>Thanks,
<br>
Josh
<br>
<p>On Tue, Jun 7, 2011 at 10:46 AM, Wesley Bland &lt;wbland_at_[hidden]&gt; wrote:
<br>
<span class="quotelev1">&gt; This could certainly work alongside another ORCM or any other fault
</span><br>
<span class="quotelev1">&gt; detection/prediction/recovery mechanism. Most of the code is just dedicated
</span><br>
<span class="quotelev1">&gt; to keeping the epoch up to date and tracking the status of the processes.
</span><br>
<span class="quotelev1">&gt; The underlying idea was to provide a way for the application to decide what
</span><br>
<span class="quotelev1">&gt; its fault policy would be rather than trying to dictate one in the runtime.
</span><br>
<span class="quotelev1">&gt; If any other layer wanted to register a callback function with this code, it
</span><br>
<span class="quotelev1">&gt; could do anything it wanted to on top of it.
</span><br>
<span class="quotelev1">&gt; Wesley
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Tuesday, June 7, 2011 at 7:41 AM, Ralph Castain wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I'm on travel this week, but will look this over when I return. From the
</span><br>
<span class="quotelev1">&gt; description, it sounds nearly identical to what we did in ORCM, so I expect
</span><br>
<span class="quotelev1">&gt; there won't be many issues. You do get some race conditions that the new
</span><br>
<span class="quotelev1">&gt; state machine code should help resolve.
</span><br>
<span class="quotelev1">&gt; Only difference I can quickly see is that we chose not to modify the process
</span><br>
<span class="quotelev1">&gt; name structure, keeping the &quot;epoch&quot; (we called it &quot;incarnation&quot;) as a
</span><br>
<span class="quotelev1">&gt; separate value. Since we aren't terribly concerned about backward
</span><br>
<span class="quotelev1">&gt; compatibility, I don't consider this a significant issue - but something the
</span><br>
<span class="quotelev1">&gt; community should recognize.
</span><br>
<span class="quotelev1">&gt; My main concern will be to ensure that the new code contains enough
</span><br>
<span class="quotelev1">&gt; flexibility to allow integration with other layers such as ORCM without
</span><br>
<span class="quotelev1">&gt; creating potential conflict over &quot;double protection&quot; - i.e., if the layer
</span><br>
<span class="quotelev1">&gt; above ORTE wants to provide a certain level of fault protection, then ORTE
</span><br>
<span class="quotelev1">&gt; needs to get out of the way.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Mon, Jun 6, 2011 at 1:00 PM, George Bosilca &lt;bosilca_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; WHAT: Allow the runtime to handle fail-stop failures for both runtime
</span><br>
<span class="quotelev1">&gt; (daemons) or application level processes. This patch extends the
</span><br>
<span class="quotelev1">&gt; orte_process_name_t structure with a field to store the process epoch (the
</span><br>
<span class="quotelev1">&gt; number of times it died so far), and add an application failure notification
</span><br>
<span class="quotelev1">&gt; callback function to be registered in the runtime.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; WHY: Necessary to correctly implement the error handling in the MPI 2.2
</span><br>
<span class="quotelev1">&gt; standard. In addition, such a resilient runtime is a cornerstone for any
</span><br>
<span class="quotelev1">&gt; level of fault tolerance support we want to provide in the future (such as
</span><br>
<span class="quotelev1">&gt; the MPI-3 Run-Through Stabilization or FT-MPI).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; WHEN:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; WHERE: Patch attached to this email, based on trunk r24747.
</span><br>
<span class="quotelev1">&gt; TIMEOUT: 2 weeks from now, on Monday 20 June.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; ------
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; MORE DETAILS:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Currently the infrastructure required to enable any kind of fault tolerance
</span><br>
<span class="quotelev1">&gt; development in Open MPI (with the exception of the checkpoint/restart) is
</span><br>
<span class="quotelev1">&gt; missing. However, before developing any fault tolerant support at the
</span><br>
<span class="quotelev1">&gt; application (MPI) level, we need to have a resilient runtime. The changes in
</span><br>
<span class="quotelev1">&gt; this patch address this lack of support and would allow anyone to implement
</span><br>
<span class="quotelev1">&gt; a fault tolerance protocol at the MPI layer without having to worry about
</span><br>
<span class="quotelev1">&gt; the ORTE stabilization.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; This patch will allow the runtime to drop any dead daemons, and re-route all
</span><br>
<span class="quotelev1">&gt; communications around the holes in order to __ALWAYS__ deliver a message as
</span><br>
<span class="quotelev1">&gt; long as the destination process is alive. The application is informed (via a
</span><br>
<span class="quotelev1">&gt; callback) about the loss of the processes with the same jobid. In this patch
</span><br>
<span class="quotelev1">&gt; we do not address the MPI_ERROR_RETURN type of failures, we focused on the
</span><br>
<span class="quotelev1">&gt; MPI_ERROR_ABORT ones. Moreover, we empowered the application level with the
</span><br>
<span class="quotelev1">&gt; decision, instead of taking it down in the runtime.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; NEW STUFF:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Epoch - A counter that tracks the number of times a process has been
</span><br>
<span class="quotelev1">&gt; detected to have terminated, either from a failure or an expected
</span><br>
<span class="quotelev1">&gt; termination. After the termination is detected, the HNP coordinates all
</span><br>
<span class="quotelev1">&gt; other process&#146;s knowledge of the new epoch. Each ORTED will know the epoch
</span><br>
<span class="quotelev1">&gt; of the other processes in the job, but it will not actually store anything
</span><br>
<span class="quotelev1">&gt; until the epochs change.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Run-Through Stabilization - When an ORTED (or HNP) detects that another
</span><br>
<span class="quotelev1">&gt; process has terminated, it repairs the routing layer and informs the HNP.
</span><br>
<span class="quotelev1">&gt; The HNP tells all other processes about the failure so they can also repair
</span><br>
<span class="quotelev1">&gt; their routing layers an update their internal bookkeeping. The processes do
</span><br>
<span class="quotelev1">&gt; not abort after the termination is detected.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Callback Function - When the HNP tells all the ORTEDs about the failures,
</span><br>
<span class="quotelev1">&gt; they tell the ORTE layers within the applications. The application level
</span><br>
<span class="quotelev1">&gt; ORTE layers have a callback function that they use to inform the OMPI layer
</span><br>
<span class="quotelev1">&gt; about the error. Currently the OMPI errhandler code fills in this callback
</span><br>
<span class="quotelev1">&gt; function so it is informed when there is an error and it aborts (to maintain
</span><br>
<span class="quotelev1">&gt; the current default behavior of MPI). This callback function can also be
</span><br>
<span class="quotelev1">&gt; used in an ORTE only application to perform application based fault
</span><br>
<span class="quotelev1">&gt; tolerance (ABFT) and allow the application to continue.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; NECESSARY FOR IMPLEMENTATION:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Epoch - The orte_process_name_t struct now has a field for epoch. This means
</span><br>
<span class="quotelev1">&gt; that whenever sending a message, the most current version of the epoch needs
</span><br>
<span class="quotelev1">&gt; to be in this field. This is a simple look up using the function in
</span><br>
<span class="quotelev1">&gt; orte/util/nidmap.c: orte_util_lookup_epoch(). In the orte/orted/orted_comm.c
</span><br>
<span class="quotelev1">&gt; code, there is a check to make sure that it isn&#146;t trying to send messages to
</span><br>
<span class="quotelev1">&gt; a process that has already terminated (don&#146;t send to a process with an epoch
</span><br>
<span class="quotelev1">&gt; less than the current epoch). Make sure that if you are sending a message,
</span><br>
<span class="quotelev1">&gt; you have the most up to date data here.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Routing - So far, only the binomial routing layer has been updated to use
</span><br>
<span class="quotelev1">&gt; the new resilience features. To modify other routing layers to be able to
</span><br>
<span class="quotelev1">&gt; continue running after a process failure, they need to be able to detect
</span><br>
<span class="quotelev1">&gt; which processes are not currently running and route around them. The errmgr
</span><br>
<span class="quotelev1">&gt; gives the routing layer two chances to do this. First it calls delete_route
</span><br>
<span class="quotelev1">&gt; for each process that fails, then it calls update_routing_tree after it has
</span><br>
<span class="quotelev1">&gt; appropriately marked each process. Before either of these things happen the
</span><br>
<span class="quotelev1">&gt; epoch and process state have already been updates so the routing layer can
</span><br>
<span class="quotelev1">&gt; use this data to determine which processes are alive and which are dead. A
</span><br>
<span class="quotelev1">&gt; convenience function has been added to orte/util/nidmap.h called
</span><br>
<span class="quotelev1">&gt; orte_util_proc_is_running() which allows the ORTEDs to determine the status
</span><br>
<span class="quotelev1">&gt; of a process. Keep in mind that a process is not running if it hasn&#146;t
</span><br>
<span class="quotelev1">&gt; started up yet so it is wise to check the epoch (to make sure that it isn&#146;t
</span><br>
<span class="quotelev1">&gt; ORTE_EPOCH_MIN) as well to make sure that you&#146;re actually detecting an error
</span><br>
<span class="quotelev1">&gt; and not just noticing that an ORTED hasn&#146;t finished starting.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Callback - If you want to implement some sort of fault tolerance on top of
</span><br>
<span class="quotelev1">&gt; this code, use the callback function in the errmgr framework. There is a new
</span><br>
<span class="quotelev1">&gt; function in the errmgr code called set_fault_callback that takes a function
</span><br>
<span class="quotelev1">&gt; pointer. The ompi_init code sets this to a default value just after it calls
</span><br>
<span class="quotelev1">&gt; orte_init (to make sure that there is an errmgr to call into). If you later
</span><br>
<span class="quotelev1">&gt; set this to a new function, you will get the callback to notify you of
</span><br>
<span class="quotelev1">&gt; process failures. Remember that you&#146;ll need to handle any sort of MPI level
</span><br>
<span class="quotelev1">&gt; fault tolerance at this point because you&#146;ve taken away the callback for the
</span><br>
<span class="quotelev1">&gt; OMPI layer.
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
<span class="quotelev1">&gt;
</span><br>
<p><p><p><pre>
-- 
Joshua Hursey
Postdoctoral Research Associate
Oak Ridge National Laboratory
<a href="http://users.nccs.gov/~jjhursey">http://users.nccs.gov/~jjhursey</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9309.php">Jeff Squyres: "Re: [OMPI devel] VT support for 1.5"</a>
<li><strong>Previous message:</strong> <a href="9307.php">Wesley Bland: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<li><strong>In reply to:</strong> <a href="9307.php">Wesley Bland: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9322.php">Josh Hursey: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<li><strong>Reply:</strong> <a href="9322.php">Josh Hursey: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
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