<?
$subject_val = "Re: [OMPI users] Question on handling of memory for communications";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Jul  8 17:25:20 2013" -->
<!-- isoreceived="20130708212520" -->
<!-- sent="Mon, 8 Jul 2013 16:25:16 -0500" -->
<!-- isosent="20130708212516" -->
<!-- name="Michael Thomadakis" -->
<!-- email="drmichaelt7777_at_[hidden]" -->
<!-- subject="Re: [OMPI users] Question on handling of memory for communications" -->
<!-- id="CA+OO3AWuC63dbvrS15cqNfLqOwP1DYeyTAm18D6Twtr+QK_JsA_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="51DAFE78.8010909_at_inria.fr" -->
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
<strong>Subject:</strong> Re: [OMPI users] Question on handling of memory for communications<br>
<strong>From:</strong> Michael Thomadakis (<em>drmichaelt7777_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-07-08 17:25:16
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="22291.php">Michael Thomadakis: "Re: [OMPI users] Question on handling of memory for communications"</a>
<li><strong>Previous message:</strong> <a href="22289.php">Michael Thomadakis: "Re: [OMPI users] Support for CUDA and GPU-direct with OpenMPI 1.6.5 an 1.7.2"</a>
<li><strong>In reply to:</strong> <a href="22285.php">Brice Goglin: "Re: [OMPI users] Question on handling of memory for communications"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="22286.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Question on handling of memory for communications"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
| The driver doesn't allocate much memory here. Maybe some small control
<br>
buffers, but nothing significantly involved in large message transfer |
<br>
performance. Everything critical here is allocated by user-space (either
<br>
MPI lib or application), so we just have to make sure we bind the
<br>
| process memory properly. I used hwloc-bind to do that.
<br>
<p>I see ... So the user level process (user or MPI library) sets aside memory
<br>
(malloc?) and basically then the OFED/IB sets up RDMA messaging with
<br>
addresses pointing back to that user physical memory. I guess before
<br>
running the MPI benchmark you requested *data *memory allocation policy to
<br>
allocate pages &quot;owned&quot; by the other socket?
<br>
<p>| Note that we have seen larger issues on older platforms. You basically
<br>
just need a big HCA and PCI link on a not-so-big machine. Not very
<br>
| common fortunately with todays QPI links between Sandy-Bridge socket,
<br>
those are quite big compared to PCI Gen3 8x links to the HCA. On
<br>
| old AMD platforms (and modern Intels with big GPUs), issues are not that
<br>
uncommon (we've seen up to 40% DMA bandwidth difference
<br>
| there).
<br>
<p>The issue that has been observed is with PCIe_gen 3 traffic on attached I/O
<br>
which, say, reads data off of the HCA and has to store it to memory but
<br>
when this memory belongs to the other socket. In that case PCI e data uses
<br>
the QPI links on SB to send out these packets to the other socket. It has
<br>
been speculated that QPI links where NOT provisioned to transfer more than
<br>
1GiB of PCIe data alongside the regular inter-NUMA memory traffic. It may
<br>
be the case that Intel has re-provisioned QPI to be able to accommodate
<br>
more PCIe traffic.
<br>
<p>Thanks again
<br>
Michael
<br>
<p><p><p>On Mon, Jul 8, 2013 at 1:01 PM, Brice Goglin &lt;Brice.Goglin_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt;  The driver doesn't allocate much memory here. Maybe some small control
</span><br>
<span class="quotelev1">&gt; buffers, but nothing significantly involved in large message transfer
</span><br>
<span class="quotelev1">&gt; performance. Everything critical here is allocated by user-space (either
</span><br>
<span class="quotelev1">&gt; MPI lib or application), so we just have to make sure we bind the process
</span><br>
<span class="quotelev1">&gt; memory properly. I used hwloc-bind to do that.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Note that we have seen larger issues on older platforms. You basically
</span><br>
<span class="quotelev1">&gt; just need a big HCA and PCI link on a not-so-big machine. Not very common
</span><br>
<span class="quotelev1">&gt; fortunately with todays QPI links between Sandy-Bridge socket, those are
</span><br>
<span class="quotelev1">&gt; quite big compared to PCI Gen3 8x links to the HCA. On old AMD platforms
</span><br>
<span class="quotelev1">&gt; (and modern Intels with big GPUs), issues are not that uncommon (we've seen
</span><br>
<span class="quotelev1">&gt; up to 40% DMA bandwidth difference there).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Brice
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Le 08/07/2013 19:44, Michael Thomadakis a &#233;crit :
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  Hi Brice,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  thanks for testing this out.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  How did you make sure that the pinned pages used by the I/O adapter
</span><br>
<span class="quotelev1">&gt; mapped to the &quot;other&quot; socket's memory controller ? Is pining the MPI binary
</span><br>
<span class="quotelev1">&gt; to a socket sufficient to pin the space used for MPI I/O as well to that
</span><br>
<span class="quotelev1">&gt; socket? I think this is something done by and at the HCA device driver
</span><br>
<span class="quotelev1">&gt; level.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  Anyways, as long as the memory performance difference is a the levels
</span><br>
<span class="quotelev1">&gt; you mentioned then there is no &quot;big&quot; issue. Most likely the device driver
</span><br>
<span class="quotelev1">&gt; get space from the same numa domain that of the socket the HCA is attached
</span><br>
<span class="quotelev1">&gt; to.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  Thanks for trying it out
</span><br>
<span class="quotelev1">&gt; Michael
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
<span class="quotelev1">&gt;  On Mon, Jul 8, 2013 at 11:45 AM, Brice Goglin &lt;Brice.Goglin_at_[hidden]&gt;wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  On a dual E5 2650 machine with FDR cards, I see the IMB Pingpong
</span><br>
<span class="quotelev2">&gt;&gt; throughput drop from 6000 to 5700MB/s when the memory isn't allocated on
</span><br>
<span class="quotelev2">&gt;&gt; the right socket (and latency increases from 0.8 to 1.4us). Of course
</span><br>
<span class="quotelev2">&gt;&gt; that's pingpong only, things will be worse on a memory-overloaded machine.
</span><br>
<span class="quotelev2">&gt;&gt; But I don't expect things to be &quot;less worse&quot; if you do an intermediate copy
</span><br>
<span class="quotelev2">&gt;&gt; through the memory near the HCA: you would overload the QPI link as much as
</span><br>
<span class="quotelev2">&gt;&gt; here, and you would overload the CPU even more because of the additional
</span><br>
<span class="quotelev2">&gt;&gt; copies.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Brice
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Le 08/07/2013 18:27, Michael Thomadakis a &#233;crit :
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; People have mentioned that they experience unexpected slow downs in
</span><br>
<span class="quotelev2">&gt;&gt; PCIe_gen3 I/O when the pages map to a socket different from the one the HCA
</span><br>
<span class="quotelev2">&gt;&gt; connects to. It is speculated that the inter-socket QPI is not provisioned
</span><br>
<span class="quotelev2">&gt;&gt; to transfer more than 1GiB/sec for PCIe_gen 3 traffic. This situation may
</span><br>
<span class="quotelev2">&gt;&gt; not be in effect on all SandyBrige or IvyBridge systems.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  Have you measured anything like this on you systems as well? That would
</span><br>
<span class="quotelev2">&gt;&gt; require using physical memory mapped to the socket w/o HCA exclusively for
</span><br>
<span class="quotelev2">&gt;&gt; MPI messaging.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  Mike
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Mon, Jul 8, 2013 at 10:52 AM, Jeff Squyres (jsquyres) &lt;
</span><br>
<span class="quotelev2">&gt;&gt; jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Jul 8, 2013, at 11:35 AM, Michael Thomadakis &lt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; drmichaelt7777_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; The issue is that when you read or write PCIe_gen 3 dat to a non-local
</span><br>
<span class="quotelev3">&gt;&gt;&gt; NUMA memory, SandyBridge will use the inter-socket QPIs to get this data
</span><br>
<span class="quotelev3">&gt;&gt;&gt; across to the other socket. I think there is considerable limitation in
</span><br>
<span class="quotelev3">&gt;&gt;&gt; PCIe I/O traffic data going over the inter-socket QPI. One way to get
</span><br>
<span class="quotelev3">&gt;&gt;&gt; around this is for reads to buffer all data into memory space local to the
</span><br>
<span class="quotelev3">&gt;&gt;&gt; same socket and then transfer them by code across to the other socket's
</span><br>
<span class="quotelev3">&gt;&gt;&gt; physical memory. For writes the same approach can be used with intermediary
</span><br>
<span class="quotelev3">&gt;&gt;&gt; process copying data.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  Sure, you'll cause congestion across the QPI network when you do
</span><br>
<span class="quotelev3">&gt;&gt;&gt; non-local PCI reads/writes.  That's a given.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; But I'm not aware of a hardware limitation on PCI-requested traffic
</span><br>
<span class="quotelev3">&gt;&gt;&gt; across QPI (I could be wrong, of course -- I'm a software guy, not a
</span><br>
<span class="quotelev3">&gt;&gt;&gt; hardware guy).  A simple test would be to bind an MPI process to a far NUMA
</span><br>
<span class="quotelev3">&gt;&gt;&gt; node and run a simple MPI bandwidth test and see if to get
</span><br>
<span class="quotelev3">&gt;&gt;&gt; better/same/worse bandwidth compared to binding an MPI process on a near
</span><br>
<span class="quotelev3">&gt;&gt;&gt; NUMA socket.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; But in terms of doing intermediate (pipelined) reads/writes to local
</span><br>
<span class="quotelev3">&gt;&gt;&gt; NUMA memory before reading/writing to PCI, no, Open MPI does not do this.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  Unless there is a PCI-QPI bandwidth constraint that we're unaware of, I'm
</span><br>
<span class="quotelev3">&gt;&gt;&gt; not sure why you would do this -- it would likely add considerable
</span><br>
<span class="quotelev3">&gt;&gt;&gt; complexity to the code and it would definitely lead to higher overall MPI
</span><br>
<span class="quotelev3">&gt;&gt;&gt; latency.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Don't forget that the MPI paradigm is for the application to provide the
</span><br>
<span class="quotelev3">&gt;&gt;&gt; send/receive buffer.  Meaning: MPI doesn't (always) control where the
</span><br>
<span class="quotelev3">&gt;&gt;&gt; buffer is located (particularly for large messages).
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; I was wondering if OpenMPI does anything special memory mapping to
</span><br>
<span class="quotelev3">&gt;&gt;&gt; work around this.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  Just what I mentioned in the prior email.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; And if with Ivy Bridge (or Haswell) he situation has improved.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  Open MPI doesn't treat these chips any different.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev3">&gt;&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; For corporate legal information go to:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
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
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; users mailing listusers_at_[hidden]<a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
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
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; users mailing listusers_at_[hidden]<a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt;
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
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/users/att-22290/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="22291.php">Michael Thomadakis: "Re: [OMPI users] Question on handling of memory for communications"</a>
<li><strong>Previous message:</strong> <a href="22289.php">Michael Thomadakis: "Re: [OMPI users] Support for CUDA and GPU-direct with OpenMPI 1.6.5 an 1.7.2"</a>
<li><strong>In reply to:</strong> <a href="22285.php">Brice Goglin: "Re: [OMPI users] Question on handling of memory for communications"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="22286.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Question on handling of memory for communications"</a>
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
