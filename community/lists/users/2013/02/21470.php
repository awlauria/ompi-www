<?
$subject_val = "Re: [OMPI users] rcu_sched stalls on CPU";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Feb 27 11:21:05 2013" -->
<!-- isoreceived="20130227162105" -->
<!-- sent="Wed, 27 Feb 2013 09:20:57 -0700" -->
<!-- isosent="20130227162057" -->
<!-- name="Simon DeDeo" -->
<!-- email="simon.dedeo_at_[hidden]" -->
<!-- subject="Re: [OMPI users] rcu_sched stalls on CPU" -->
<!-- id="E8630C85-5A8A-4212-A5F5-AF2D3C036A2A_at_gmail.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="9642E77E-72A4-4643-A713-E7719A1655E7_at_gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI users] rcu_sched stalls on CPU<br>
<strong>From:</strong> Simon DeDeo (<em>simon.dedeo_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-02-27 11:20:57
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="21471.php">Jeff Squyres (jsquyres): "Re: [OMPI users] rcu_sched stalls on CPU"</a>
<li><strong>Previous message:</strong> <a href="21469.php">Ralph Castain: "Re: [OMPI users] OpenFabrics (openib)"</a>
<li><strong>In reply to:</strong> <a href="21462.php">Simon DeDeo: "[OMPI users] rcu_sched stalls on CPU"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="21471.php">Jeff Squyres (jsquyres): "Re: [OMPI users] rcu_sched stalls on CPU"</a>
<li><strong>Reply:</strong> <a href="21471.php">Jeff Squyres (jsquyres): "Re: [OMPI users] rcu_sched stalls on CPU"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
We've resolved this issue, which appears to have been an early warning of a large-scale hardware failure. Twelve hours later the machine was unable to power-on or self-test. 
<br>
<p>We are now running on a new machine, and the same jobs are finishing normally -- without having to worry about Send/Ssend/Isend buffering differences, and relying solely on blocking communication.
<br>
<p>Simon
<br>
<p>Research Fellow
<br>
Santa Fe Institute
<br>
<a href="http://santafe.edu/~simon">http://santafe.edu/~simon</a>
<br>
<p>On 25 Feb 2013, at 4:04 PM, Simon DeDeo &lt;simon.dedeo_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; I have been having some trouble tracing the source of a CPU stall with open MPI on Gentoo.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; My code is very simple: each process does a Monte Carlo run, saves some data to disk, and sends back a single MPI_DOUBLE to node zero, which picks the best value from all the computations (including the one it did itself).
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; For some reason, this can cause CPUs to &quot;stall&quot; (see the error below, on dmesg output) -- this stall actually causes the system to crash and reboot, which seems pretty crazy.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; My best guess is that some of the nodes greater than zero have &quot;MPI_Send&quot;s out, but node zero is not finished with its own computation yet, and so has not put out an MPI_Recv. They get mad waiting? This happens when I give the Monte Carlo runs large numbers, and so the variance in end time is larger.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; However, the behavior seems a bit extreme, and I am wondering if something more subtle is going on. My sysadmin was trying to fix something on the machine the last time it crashed, and it trashed the kernel! So I am also in the sysadmin doghouse.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Any help or advice greatly appreciated! Is it likely to be an MPI_Send/MPI_Recv problem, or is there something else going on?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; [ 1273.079260] INFO: rcu_sched detected stalls on CPUs/tasks: { 12 13} (detected by 17, t=60002 jiffies)
</span><br>
<span class="quotelev1">&gt; [ 1273.079272] Pid: 2626, comm: cluster Not tainted 3.6.11-gentoo #10
</span><br>
<span class="quotelev1">&gt; [ 1273.079275] Call Trace:
</span><br>
<span class="quotelev1">&gt; [ 1273.079277]  &lt;IRQ&gt;  [&lt;ffffffff81099b87&gt;] rcu_check_callbacks+0x5a7/0x600
</span><br>
<span class="quotelev1">&gt; [ 1273.079294]  [&lt;ffffffff8103fae3&gt;] update_process_times+0x43/0x80
</span><br>
<span class="quotelev1">&gt; [ 1273.079298]  [&lt;ffffffff8106d796&gt;] tick_sched_timer+0x76/0xc0
</span><br>
<span class="quotelev1">&gt; [ 1273.079303]  [&lt;ffffffff8105329e&gt;] __run_hrtimer.isra.33+0x4e/0x100
</span><br>
<span class="quotelev1">&gt; [ 1273.079306]  [&lt;ffffffff81053adb&gt;] hrtimer_interrupt+0xeb/0x220
</span><br>
<span class="quotelev1">&gt; [ 1273.079311]  [&lt;ffffffff8101fd94&gt;] smp_apic_timer_interrupt+0x64/0xa0
</span><br>
<span class="quotelev1">&gt; [ 1273.079316]  [&lt;ffffffff81515f07&gt;] apic_timer_interrupt+0x67/0x70
</span><br>
<span class="quotelev1">&gt; [ 1273.079317]  &lt;EOI&gt;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Simon
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Research Fellow
</span><br>
<span class="quotelev1">&gt; Santa Fe Institute
</span><br>
<span class="quotelev1">&gt; <a href="http://santafe.edu/~simon">http://santafe.edu/~simon</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="21471.php">Jeff Squyres (jsquyres): "Re: [OMPI users] rcu_sched stalls on CPU"</a>
<li><strong>Previous message:</strong> <a href="21469.php">Ralph Castain: "Re: [OMPI users] OpenFabrics (openib)"</a>
<li><strong>In reply to:</strong> <a href="21462.php">Simon DeDeo: "[OMPI users] rcu_sched stalls on CPU"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="21471.php">Jeff Squyres (jsquyres): "Re: [OMPI users] rcu_sched stalls on CPU"</a>
<li><strong>Reply:</strong> <a href="21471.php">Jeff Squyres (jsquyres): "Re: [OMPI users] rcu_sched stalls on CPU"</a>
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
