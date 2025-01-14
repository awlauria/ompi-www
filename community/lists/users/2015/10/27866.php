<?
$subject_val = "Re: [OMPI users] fatal error: openmpi-v2.x-dev-415-g5c9b192 andopenmpi-dev-2696-gd579a07";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Oct 14 21:38:31 2015" -->
<!-- isoreceived="20151015013831" -->
<!-- sent="Thu, 15 Oct 2015 10:38:25 +0900" -->
<!-- isosent="20151015013825" -->
<!-- name="Gilles Gouaillardet" -->
<!-- email="gilles_at_[hidden]" -->
<!-- subject="Re: [OMPI users] fatal error: openmpi-v2.x-dev-415-g5c9b192 andopenmpi-dev-2696-gd579a07" -->
<!-- id="561F0391.1080502_at_rist.or.jp" -->
<!-- charset="windows-1252" -->
<!-- inreplyto="5614CD03.1010306_at_informatik.hs-fulda.de" -->
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
<strong>Subject:</strong> Re: [OMPI users] fatal error: openmpi-v2.x-dev-415-g5c9b192 andopenmpi-dev-2696-gd579a07<br>
<strong>From:</strong> Gilles Gouaillardet (<em>gilles_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-10-14 21:38:25
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="27867.php">Siegmar Gross: "Re: [OMPI users] fatal error:openmpi-v2.x-dev-415-g5c9b192andopenmpi-dev-2696-gd579a07"</a>
<li><strong>Previous message:</strong> <a href="27865.php">Georg Geiser: "Re: [OMPI users] MPI_GATHERV error"</a>
<li><strong>In reply to:</strong> <a href="27826.php">Siegmar Gross: "[OMPI users] fatal error: openmpi-v2.x-dev-415-g5c9b192 andopenmpi-dev-2696-gd579a07"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="27867.php">Siegmar Gross: "Re: [OMPI users] fatal error:openmpi-v2.x-dev-415-g5c9b192andopenmpi-dev-2696-gd579a07"</a>
<li><strong>Reply:</strong> <a href="27867.php">Siegmar Gross: "Re: [OMPI users] fatal error:openmpi-v2.x-dev-415-g5c9b192andopenmpi-dev-2696-gd579a07"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Siegmar,
<br>
<p>i suggested a fix that has yet to be reviewed
<br>
see <a href="https://github.com/open-mpi/ompi/pull/1028">https://github.com/open-mpi/ompi/pull/1028</a>
<br>
<p>in the mean time, and as a work around, you can make sure
<br>
CPPFLAGS is not set in your environment( or set it to &quot;&quot;), and then 
<br>
invoke configure
<br>
without CPPFLAGS=&quot;&quot;
<br>
<p>assuming you are using a bash shell, you can simply do
<br>
CPPFLAGS=&quot;&quot; configure ...
<br>
instead of
<br>
configure ... CPPFLAGS=&quot;&quot;
<br>
<p>Cheers,
<br>
<p>Gilles
<br>
<p>On 10/7/2015 4:42 PM, Siegmar Gross wrote:
<br>
<span class="quotelev1">&gt; Hi,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I tried to build openmpi-v2.x-dev-415-g5c9b192 and
</span><br>
<span class="quotelev1">&gt; openmpi-dev-2696-gd579a07 on my machines (Solaris 10 Sparc, Solaris 10
</span><br>
<span class="quotelev1">&gt; x86_64, and openSUSE Linux 12.1 x86_64) with gcc-5.1.0 and Sun C 5.13.
</span><br>
<span class="quotelev1">&gt; I got the following error on all platforms with gcc and with Sun C only
</span><br>
<span class="quotelev1">&gt; on my Linux machine. I've already reported the problem September 8th
</span><br>
<span class="quotelev1">&gt; for the master trunk (at that time I didn't have the problem for the
</span><br>
<span class="quotelev1">&gt; v2.x trunk. I use the following configure command.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; ../openmpi-dev-2696-gd579a07/configure \
</span><br>
<span class="quotelev1">&gt;   --prefix=/usr/local/openmpi-master_64_gcc \
</span><br>
<span class="quotelev1">&gt;   --libdir=/usr/local/openmpi-master_64_gcc/lib64 \
</span><br>
<span class="quotelev1">&gt;   --with-jdk-bindir=/usr/local/jdk1.8.0/bin \
</span><br>
<span class="quotelev1">&gt;   --with-jdk-headers=/usr/local/jdk1.8.0/include \
</span><br>
<span class="quotelev1">&gt;   JAVA_HOME=/usr/local/jdk1.8.0 \
</span><br>
<span class="quotelev1">&gt;   LDFLAGS=&quot;-m64&quot; CC=&quot;gcc&quot; CXX=&quot;g++&quot; FC=&quot;gfortran&quot; \
</span><br>
<span class="quotelev1">&gt;   CFLAGS=&quot;-m64&quot; CXXFLAGS=&quot;-m64&quot; FCFLAGS=&quot;-m64&quot; \
</span><br>
<span class="quotelev1">&gt;   CPP=&quot;cpp&quot; CXXCPP=&quot;cpp&quot; \
</span><br>
<span class="quotelev1">&gt;   CPPFLAGS=&quot;&quot; CXXCPPFLAGS=&quot;&quot; \
</span><br>
<span class="quotelev1">&gt;   --enable-mpi-cxx \
</span><br>
<span class="quotelev1">&gt;   --enable-cxx-exceptions \
</span><br>
<span class="quotelev1">&gt;   --enable-mpi-java \
</span><br>
<span class="quotelev1">&gt;   --enable-heterogeneous \
</span><br>
<span class="quotelev1">&gt;   --enable-mpi-thread-multiple \
</span><br>
<span class="quotelev1">&gt;   --with-hwloc=internal \
</span><br>
<span class="quotelev1">&gt;   --without-verbs \
</span><br>
<span class="quotelev1">&gt;   --with-wrapper-cflags=&quot;-std=c11 -m64&quot; \
</span><br>
<span class="quotelev1">&gt;   --with-wrapper-cxxflags=&quot;-m64&quot; \
</span><br>
<span class="quotelev1">&gt;   --with-wrapper-fcflags=&quot;-m64&quot; \
</span><br>
<span class="quotelev1">&gt;   --enable-debug \
</span><br>
<span class="quotelev1">&gt;   |&amp; tee log.configure.$SYSTEM_ENV.$MACHINE_ENV.64_gcc
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; openmpi-v2.x-dev-415-g5c9b192:
</span><br>
<span class="quotelev1">&gt; ==============================
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; linpc1 openmpi-v2.x-dev-415-g5c9b192-Linux.x86_64.64_gcc 135 tail -15 
</span><br>
<span class="quotelev1">&gt; log.make.Linux.x86_64.64_gcc
</span><br>
<span class="quotelev1">&gt;   CC       src/class/pmix_pointer_array.lo
</span><br>
<span class="quotelev1">&gt;   CC       src/class/pmix_hash_table.lo
</span><br>
<span class="quotelev1">&gt;   CC       src/include/pmix_globals.lo
</span><br>
<span class="quotelev1">&gt; In file included from 
</span><br>
<span class="quotelev1">&gt; ../../../../../../openmpi-v2.x-dev-415-g5c9b192/opal/mca/pmix/pmix1xx/pmix/src/include/pmix_globals.c:19:0:
</span><br>
<span class="quotelev1">&gt; /export2/src/openmpi-2.0.0/openmpi-v2.x-dev-415-g5c9b192/opal/mca/pmix/pmix1xx/pmix/include/private/types.h:43:27: 
</span><br>
<span class="quotelev1">&gt; fatal error: opal/mca/event/libevent2022/libevent2022.h: No such file 
</span><br>
<span class="quotelev1">&gt; or directory
</span><br>
<span class="quotelev1">&gt; compilation terminated.
</span><br>
<span class="quotelev1">&gt; make[4]: *** [src/include/pmix_globals.lo] Error 1
</span><br>
<span class="quotelev1">&gt; make[4]: Leaving directory 
</span><br>
<span class="quotelev1">&gt; `/export2/src/openmpi-2.0.0/openmpi-v2.x-dev-415-g5c9b192-Linux.x86_64.64_gcc/opal/mca/pmix/pmix1xx/pmix'
</span><br>
<span class="quotelev1">&gt; make[3]: *** [all-recursive] Error 1
</span><br>
<span class="quotelev1">&gt; make[3]: Leaving directory 
</span><br>
<span class="quotelev1">&gt; `/export2/src/openmpi-2.0.0/openmpi-v2.x-dev-415-g5c9b192-Linux.x86_64.64_gcc/opal/mca/pmix/pmix1xx/pmix'
</span><br>
<span class="quotelev1">&gt; make[2]: *** [all-recursive] Error 1
</span><br>
<span class="quotelev1">&gt; make[2]: Leaving directory 
</span><br>
<span class="quotelev1">&gt; `/export2/src/openmpi-2.0.0/openmpi-v2.x-dev-415-g5c9b192-Linux.x86_64.64_gcc/opal/mca/pmix/pmix1xx'
</span><br>
<span class="quotelev1">&gt; make[1]: *** [all-recursive] Error 1
</span><br>
<span class="quotelev1">&gt; make[1]: Leaving directory 
</span><br>
<span class="quotelev1">&gt; `/export2/src/openmpi-2.0.0/openmpi-v2.x-dev-415-g5c9b192-Linux.x86_64.64_gcc/opal'
</span><br>
<span class="quotelev1">&gt; make: *** [all-recursive] Error 1
</span><br>
<span class="quotelev1">&gt; linpc1 openmpi-v2.x-dev-415-g5c9b192-Linux.x86_64.64_gcc 135
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; openmpi-dev-2696-gd579a07:
</span><br>
<span class="quotelev1">&gt; ==========================
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; linpc1 openmpi-dev-2696-gd579a07-Linux.x86_64.64_gcc 158 tail -15 
</span><br>
<span class="quotelev1">&gt; log.make.Linux.x86_64.64_gcc
</span><br>
<span class="quotelev1">&gt;   CC       src/class/pmix_pointer_array.lo
</span><br>
<span class="quotelev1">&gt;   CC       src/class/pmix_hash_table.lo
</span><br>
<span class="quotelev1">&gt;   CC       src/include/pmix_globals.lo
</span><br>
<span class="quotelev1">&gt; In file included from 
</span><br>
<span class="quotelev1">&gt; ../../../../../../openmpi-dev-2696-gd579a07/opal/mca/pmix/pmix1xx/pmix/src/include/pmix_globals.c:19:0:
</span><br>
<span class="quotelev1">&gt; /export2/src/openmpi-master/openmpi-dev-2696-gd579a07/opal/mca/pmix/pmix1xx/pmix/include/private/types.h:43:27: 
</span><br>
<span class="quotelev1">&gt; fatal error: opal/mca/event/libevent2022/libevent2022.h: No such file 
</span><br>
<span class="quotelev1">&gt; or directory
</span><br>
<span class="quotelev1">&gt; compilation terminated.
</span><br>
<span class="quotelev1">&gt; make[4]: *** [src/include/pmix_globals.lo] Error 1
</span><br>
<span class="quotelev1">&gt; make[4]: Leaving directory 
</span><br>
<span class="quotelev1">&gt; `/export2/src/openmpi-master/openmpi-dev-2696-gd579a07-Linux.x86_64.64_gcc/opal/mca/pmix/pmix1xx/pmix'
</span><br>
<span class="quotelev1">&gt; make[3]: *** [all-recursive] Error 1
</span><br>
<span class="quotelev1">&gt; make[3]: Leaving directory 
</span><br>
<span class="quotelev1">&gt; `/export2/src/openmpi-master/openmpi-dev-2696-gd579a07-Linux.x86_64.64_gcc/opal/mca/pmix/pmix1xx/pmix'
</span><br>
<span class="quotelev1">&gt; make[2]: *** [all-recursive] Error 1
</span><br>
<span class="quotelev1">&gt; make[2]: Leaving directory 
</span><br>
<span class="quotelev1">&gt; `/export2/src/openmpi-master/openmpi-dev-2696-gd579a07-Linux.x86_64.64_gcc/opal/mca/pmix/pmix1xx'
</span><br>
<span class="quotelev1">&gt; make[1]: *** [all-recursive] Error 1
</span><br>
<span class="quotelev1">&gt; make[1]: Leaving directory 
</span><br>
<span class="quotelev1">&gt; `/export2/src/openmpi-master/openmpi-dev-2696-gd579a07-Linux.x86_64.64_gcc/opal'
</span><br>
<span class="quotelev1">&gt; make: *** [all-recursive] Error 1
</span><br>
<span class="quotelev1">&gt; linpc1 openmpi-dev-2696-gd579a07-Linux.x86_64.64_gcc 159
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I would be grateful if somebody can fix the problem. Thank you very much
</span><br>
<span class="quotelev1">&gt; for any help in advance.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Kind regards
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Siegmar
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
<span class="quotelev1">&gt; users mailing list
</span><br>
<span class="quotelev1">&gt; users_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/10/27826.php">http://www.open-mpi.org/community/lists/users/2015/10/27826.php</a>
</span><br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/users/att-27866/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="27867.php">Siegmar Gross: "Re: [OMPI users] fatal error:openmpi-v2.x-dev-415-g5c9b192andopenmpi-dev-2696-gd579a07"</a>
<li><strong>Previous message:</strong> <a href="27865.php">Georg Geiser: "Re: [OMPI users] MPI_GATHERV error"</a>
<li><strong>In reply to:</strong> <a href="27826.php">Siegmar Gross: "[OMPI users] fatal error: openmpi-v2.x-dev-415-g5c9b192 andopenmpi-dev-2696-gd579a07"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="27867.php">Siegmar Gross: "Re: [OMPI users] fatal error:openmpi-v2.x-dev-415-g5c9b192andopenmpi-dev-2696-gd579a07"</a>
<li><strong>Reply:</strong> <a href="27867.php">Siegmar Gross: "Re: [OMPI users] fatal error:openmpi-v2.x-dev-415-g5c9b192andopenmpi-dev-2696-gd579a07"</a>
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
