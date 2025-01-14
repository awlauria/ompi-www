<?
$subject_val = "Re: [OMPI users] openmpi-1.7.4a1r29646 with -hostfile option under Torque manager";
include("../../include/msg-header.inc");
?>
<!-- received="Sun Nov 24 11:29:25 2013" -->
<!-- isoreceived="20131124162925" -->
<!-- sent="Sun, 24 Nov 2013 08:29:06 -0800" -->
<!-- isosent="20131124162906" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI users] openmpi-1.7.4a1r29646 with -hostfile option under Torque manager" -->
<!-- id="F69E76A4-22E3-425F-8DF4-9D02269767AC_at_open-mpi.org" -->
<!-- charset="iso-8859-1" -->
<!-- inreplyto="CAMD57ocphYj7U=Ggqxx8AVo1mtNgP6ENUCTg8oxrHRDMW+sMyA_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI users] openmpi-1.7.4a1r29646 with -hostfile option under Torque manager<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-11-24 11:29:06
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="23044.php">Dominique Orban: "Re: [OMPI users] MPI process hangs if OpenMPI is compiled with --enable-thread-multiple"</a>
<li><strong>Previous message:</strong> <a href="23042.php">Pierre Jolivet: "Re: [OMPI users] MPI process hangs if OpenMPI is compiled with --enable-thread-multiple"</a>
<li><strong>In reply to:</strong> <a href="23001.php">Ralph Castain: "Re: [OMPI users] openmpi-1.7.4a1r29646 with -hostfile option under Torque manager"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="23064.php">tmishima_at_[hidden]: "Re: [OMPI users] openmpi-1.7.4a1r29646 with -hostfile option under Torque manager"</a>
<li><strong>Reply:</strong> <a href="23064.php">tmishima_at_[hidden]: "Re: [OMPI users] openmpi-1.7.4a1r29646 with -hostfile option under Torque manager"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Fixed and scheduled to move to 1.7.4. Thanks again!
<br>
<p><p>On Nov 17, 2013, at 6:11 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Thanks! That's precisely where I was going to look when I had time :-)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I'll update tomorrow.
</span><br>
<span class="quotelev1">&gt; Ralph
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Sun, Nov 17, 2013 at 7:01 PM, &lt;tmishima_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Hi Ralph,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; This is the continuous story of &quot;Segmentation fault in oob_tcp.c of
</span><br>
<span class="quotelev1">&gt; openmpi-1.7.4a1r29646&quot;.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I found the cause.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Firstly, I noticed that your hostfile can work and mine can not.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Your host file:
</span><br>
<span class="quotelev1">&gt; cat hosts
</span><br>
<span class="quotelev1">&gt; bend001 slots=12
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; My host file:
</span><br>
<span class="quotelev1">&gt; cat hosts
</span><br>
<span class="quotelev1">&gt; node08
</span><br>
<span class="quotelev1">&gt; node08
</span><br>
<span class="quotelev1">&gt; ...(total 8 lines)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I modified my script file to add &quot;slots=1&quot; to each line of my hostfile
</span><br>
<span class="quotelev1">&gt; just before launching mpirun. Then it worked.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; My host file(modified):
</span><br>
<span class="quotelev1">&gt; cat hosts
</span><br>
<span class="quotelev1">&gt; node08 slots=1
</span><br>
<span class="quotelev1">&gt; node08 slots=1
</span><br>
<span class="quotelev1">&gt; ...(total 8 lines)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Secondary, I confirmed that there's a slight difference between
</span><br>
<span class="quotelev1">&gt; orte/util/hostfile/hostfile.c of 1.7.3 and that of 1.7.4a1r29646.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; $ diff
</span><br>
<span class="quotelev1">&gt; hostfile.c.org ../../../../openmpi-1.7.3/orte/util/hostfile/hostfile.c
</span><br>
<span class="quotelev1">&gt; 394,401c394,399
</span><br>
<span class="quotelev1">&gt; &lt;     if (got_count) {
</span><br>
<span class="quotelev1">&gt; &lt;         node-&gt;slots_given = true;
</span><br>
<span class="quotelev1">&gt; &lt;     } else if (got_max) {
</span><br>
<span class="quotelev1">&gt; &lt;         node-&gt;slots = node-&gt;slots_max;
</span><br>
<span class="quotelev1">&gt; &lt;         node-&gt;slots_given = true;
</span><br>
<span class="quotelev1">&gt; &lt;     } else {
</span><br>
<span class="quotelev1">&gt; &lt;         /* should be set by obj_new, but just to be clear */
</span><br>
<span class="quotelev1">&gt; &lt;         node-&gt;slots_given = false;
</span><br>
<span class="quotelev1">&gt; ---
</span><br>
<span class="quotelev2">&gt; &gt;     if (!got_count) {
</span><br>
<span class="quotelev2">&gt; &gt;         if (got_max) {
</span><br>
<span class="quotelev2">&gt; &gt;             node-&gt;slots = node-&gt;slots_max;
</span><br>
<span class="quotelev2">&gt; &gt;         } else {
</span><br>
<span class="quotelev2">&gt; &gt;             ++node-&gt;slots;
</span><br>
<span class="quotelev2">&gt; &gt;         }
</span><br>
<span class="quotelev1">&gt; ....
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Finally, I added the line 402 below just as a tentative trial.
</span><br>
<span class="quotelev1">&gt; Then, it worked.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; cat -n orte/util/hostfile/hostfile.c:
</span><br>
<span class="quotelev1">&gt;    ...
</span><br>
<span class="quotelev1">&gt;    394      if (got_count) {
</span><br>
<span class="quotelev1">&gt;    395          node-&gt;slots_given = true;
</span><br>
<span class="quotelev1">&gt;    396      } else if (got_max) {
</span><br>
<span class="quotelev1">&gt;    397          node-&gt;slots = node-&gt;slots_max;
</span><br>
<span class="quotelev1">&gt;    398          node-&gt;slots_given = true;
</span><br>
<span class="quotelev1">&gt;    399      } else {
</span><br>
<span class="quotelev1">&gt;    400          /* should be set by obj_new, but just to be clear */
</span><br>
<span class="quotelev1">&gt;    401          node-&gt;slots_given = false;
</span><br>
<span class="quotelev1">&gt;    402          ++node-&gt;slots; /* added by tmishima */
</span><br>
<span class="quotelev1">&gt;    403      }
</span><br>
<span class="quotelev1">&gt;    ...
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Please fix the problem properly, because it's just based on my
</span><br>
<span class="quotelev1">&gt; random guess. It's related to the treatment of hostfile where slots
</span><br>
<span class="quotelev1">&gt; information is not given.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Regards,
</span><br>
<span class="quotelev1">&gt; Tetsuya Mishima
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
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/users/att-23043/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="23044.php">Dominique Orban: "Re: [OMPI users] MPI process hangs if OpenMPI is compiled with --enable-thread-multiple"</a>
<li><strong>Previous message:</strong> <a href="23042.php">Pierre Jolivet: "Re: [OMPI users] MPI process hangs if OpenMPI is compiled with --enable-thread-multiple"</a>
<li><strong>In reply to:</strong> <a href="23001.php">Ralph Castain: "Re: [OMPI users] openmpi-1.7.4a1r29646 with -hostfile option under Torque manager"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="23064.php">tmishima_at_[hidden]: "Re: [OMPI users] openmpi-1.7.4a1r29646 with -hostfile option under Torque manager"</a>
<li><strong>Reply:</strong> <a href="23064.php">tmishima_at_[hidden]: "Re: [OMPI users] openmpi-1.7.4a1r29646 with -hostfile option under Torque manager"</a>
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
