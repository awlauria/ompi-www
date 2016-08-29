<?
$subject_val = "Re: [OMPI devel] make check fails for Intel 2011.6.233 (OpenMPI 1.4.3)";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Oct  7 21:46:23 2011" -->
<!-- isoreceived="20111008014623" -->
<!-- sent="Fri, 7 Oct 2011 21:46:18 -0400" -->
<!-- isosent="20111008014618" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] make check fails for Intel 2011.6.233 (OpenMPI 1.4.3)" -->
<!-- id="29174C30-E35B-41F6-B4E4-C709F2BB0CB6_at_eecs.utk.edu" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="F0323398-BC74-4234-807B-C2126F3E1554_at_usgs.gov" -->
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
<strong>Subject:</strong> Re: [OMPI devel] make check fails for Intel 2011.6.233 (OpenMPI 1.4.3)<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-10-07 21:46:18
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9799.php">Jeff Squyres: "Re: [OMPI devel] RFC: CRS Module for MTCP Checkpointing Package"</a>
<li><strong>Previous message:</strong> <a href="9797.php">Alex Brick: "Re: [OMPI devel] RFC: CRS Module for MTCP Checkpointing Package"</a>
<li><strong>In reply to:</strong> <a href="9795.php">Larry Baker: "Re: [OMPI devel] make check fails for Intel 2011.6.233 (OpenMPI 1.4.3)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9830.php">Larry Baker: "Re: [OMPI devel] make check fails for Intel 2011.6.233 (OpenMPI 1.4.3)"</a>
<li><strong>Reply:</strong> <a href="9830.php">Larry Baker: "Re: [OMPI devel] make check fails for Intel 2011.6.233 (OpenMPI 1.4.3)"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
The may_alias attribute was part of a forward-looking attribute checking, at a time where few compiler supported them. This explains why they are not widely used in the library itself. Moreover, as they do not affect the compilation itself (as your test highlights this is not the issue with the icc 2011.6.233 compiler), there is no urge to remove the may_alias support.
<br>
<p>I just got that particular version of the compiler installed on one of our machines. I'll give it a try over the weekend.
<br>
<p>&nbsp;&nbsp;george.
<br>
<p>On Oct 7, 2011, at 20:21 , Larry Baker wrote:
<br>
<p><span class="quotelev1">&gt; The test for the __may_alias_ attribute uses the following short code snippet:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; int * p_value __attribute__ ((__may_alias__));
</span><br>
<span class="quotelev2">&gt;&gt; int
</span><br>
<span class="quotelev2">&gt;&gt; main ()
</span><br>
<span class="quotelev2">&gt;&gt; {
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   ;
</span><br>
<span class="quotelev2">&gt;&gt;   return 0;
</span><br>
<span class="quotelev2">&gt;&gt; }
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Indeed, for Intel 2011 compilers prior to 2011.6.233, this results in a warning:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; root_at_hydra openmpi-1.4.3]# module load compilers/intel/2011.5.220
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_hydra openmpi-1.4.3]# icc -c may_alias_test.c 
</span><br>
<span class="quotelev2">&gt;&gt; may_alias_test.c(123): warning #1292: attribute &quot;__may_alias__&quot; ignored
</span><br>
<span class="quotelev2">&gt;&gt;   int * p_value __attribute__ ((__may_alias__));
</span><br>
<span class="quotelev2">&gt;&gt;                                 ^
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_hydra openmpi-1.4.3]# module unload compilers/intel/2011.5.220
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_hydra openmpi-1.4.3]# module load compilers/intel/2011.6.233
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_hydra openmpi-1.4.3]# icc -c may_alias_test.c 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I modified ./configure to force
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; ompi_cv___attribute__may_alias=0
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Then I compiled and tested the library.  Unfortunately, the results were exactly the same:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make  check-TESTS
</span><br>
<span class="quotelev2">&gt;&gt; make[3]: Entering directory `/state/partition1/root/src/openmpi-1.4.3/test/datatype'
</span><br>
<span class="quotelev2">&gt;&gt; /bin/sh: line 4: 26326 Segmentation fault      ${dir}$tst
</span><br>
<span class="quotelev2">&gt;&gt; FAIL: checksum
</span><br>
<span class="quotelev2">&gt;&gt; /bin/sh: line 4: 26359 Segmentation fault      ${dir}$tst
</span><br>
<span class="quotelev2">&gt;&gt; FAIL: position
</span><br>
<span class="quotelev2">&gt;&gt; ========================================================
</span><br>
<span class="quotelev2">&gt;&gt; 2 of 2 tests failed
</span><br>
<span class="quotelev2">&gt;&gt; Please report to <a href="http://www.open-mpi.org/community/help/">http://www.open-mpi.org/community/help/</a>
</span><br>
<span class="quotelev2">&gt;&gt; ========================================================
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I could not find any use of the may_alias attribute, other than in a #define in opal/include/opal_config_bottom.h.  Is OMPI_HAVE_ATTRIBUTE_MAY_ALIAS just cruft that can be removed?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Larry Baker
</span><br>
<span class="quotelev1">&gt; US Geological Survey
</span><br>
<span class="quotelev1">&gt; 650-329-5608
</span><br>
<span class="quotelev1">&gt; baker_at_[hidden]
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On 7 Oct 2011, at 11:08 AM, Larry Baker wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; I ran into a problem this past week trying to upgrade our OpenMPI 1.4.3 for the latest Intel 2011 compiler, 2011.6.233.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make check fails with Segmentation Fault errors:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; [root_at_hydra openmpi-1.4.3]# tail -20 ../openmpi-1.4.3-check-intel.6.233.log
</span><br>
<span class="quotelev3">&gt;&gt;&gt; /bin/sh ../../libtool --tag=CC   --mode=link icc  -DNDEBUG -g -O3 -finline-functions -fno-strict-aliasing -restrict -pthread -fvisibility=hidden -shared-intel -export-dynamic -shared-intel  -o ddt_pack ddt_pack.o ../../ompi/libmpi.la -lnsl -lutil  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; libtool: link: icc -DNDEBUG -g -O3 -finline-functions -fno-strict-aliasing -restrict -pthread -fvisibility=hidden -shared-intel -shared-intel -o .libs/ddt_pack ddt_pack.o -Wl,--export-dynamic  ../../ompi/.libs/libmpi.so /usr/local/src/openmpi-1.4.3/orte/.libs/libopen-rte.so /usr/local/src/openmpi-1.4.3/opal/.libs/libopen-pal.so -ldl -lnsl -lutil -pthread -Wl,-rpath -Wl,/usr/local/lib
</span><br>
<span class="quotelev3">&gt;&gt;&gt; make[3]: Leaving directory `/state/partition1/root/src/openmpi-1.4.3/test/datatype'
</span><br>
<span class="quotelev3">&gt;&gt;&gt; make  check-TESTS
</span><br>
<span class="quotelev3">&gt;&gt;&gt; make[3]: Entering directory `/state/partition1/root/src/openmpi-1.4.3/test/datatype'
</span><br>
<span class="quotelev3">&gt;&gt;&gt; /bin/sh: line 4:  6322 Segmentation fault      ${dir}$tst
</span><br>
<span class="quotelev3">&gt;&gt;&gt; FAIL: checksum
</span><br>
<span class="quotelev3">&gt;&gt;&gt; /bin/sh: line 4:  6355 Segmentation fault      ${dir}$tst
</span><br>
<span class="quotelev3">&gt;&gt;&gt; FAIL: position
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ========================================================
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 2 of 2 tests failed
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Please report to <a href="http://www.open-mpi.org/community/help/">http://www.open-mpi.org/community/help/</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ========================================================
</span><br>
<span class="quotelev3">&gt;&gt;&gt; make[3]: *** [check-TESTS] Error 1
</span><br>
<span class="quotelev3">&gt;&gt;&gt; make[3]: Leaving directory `/state/partition1/root/src/openmpi-1.4.3/test/datatype'
</span><br>
<span class="quotelev3">&gt;&gt;&gt; make[2]: *** [check-am] Error 2
</span><br>
<span class="quotelev3">&gt;&gt;&gt; make[2]: Leaving directory `/state/partition1/root/src/openmpi-1.4.3/test/datatype'
</span><br>
<span class="quotelev3">&gt;&gt;&gt; make[1]: *** [check-recursive] Error 1
</span><br>
<span class="quotelev3">&gt;&gt;&gt; make[1]: Leaving directory `/state/partition1/root/src/openmpi-1.4.3/test'
</span><br>
<span class="quotelev3">&gt;&gt;&gt; make: *** [check-recursive] Error 1
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Before trying to track down the problem, I thought I'd describe what I see here in case someone recognizes what might be happening.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; We have been using OpenMPI 1.4.3 compiled with the Intel 2011.3.174 compiler.  I've updated the Intel 2011 compilers as they have come out with new versions: 2011.4.191, 2011.5.220, and now 2011.6.233.  However, I've not recompiled OpenMPI 1.4.3 until now.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Since the original compilation of OpenMPI 1.4.3 with the Intel 2011.3.174 compilers, I have installed libnuma and libnuma-devel RPMs on our cluster front end.  I noticed that changed the OpenMPI 1.4.3 ./configure output.  To test that this was not the cause of the problem, I recompiled OpenMPI 1.4.3 using both the CentOS/Rocks GNU compilers and the Intel 2011.3.174 compilers.  They both passed all the make check tests.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; To find out when this problem first occurs, I systematically configured, compiled, and checked OpenMPI 1.4.3 with all four versions of the Intel 2011 compilers we have.  We use the modules package to load the compiler environment:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; [root_at_hydra openmpi-1.4.3]# env | grep /opt/intel
</span><br>
<span class="quotelev3">&gt;&gt;&gt; LD_LIBRARY_PATH=/opt/intel/composer_xe_2011_sp1.6.233/compiler/lib/intel64:/opt/intel/composer_xe_2011_sp1.6.233/mkl/lib/intel64
</span><br>
<span class="quotelev3">&gt;&gt;&gt; PATH=/opt/intel/composer_xe_2011_sp1.6.233/bin/intel64:/usr/kerberos/sbin:/usr/kerberos/bin:/usr/java/latest/bin:/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin:/opt/eclipse:/opt/ganglia/bin:/opt/ganglia/sbin:/opt/maui/bin:/opt/torque/bin:/opt/torque/sbin:/opt/rocks/bin:/opt/rocks/sbin:/root/bin
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Here's the steps I use to make and test OpenMPI 1.4.3 (I use a patched version to accommodate the six compilers we have; I've submitted those patches here in the past):
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # cd /usr/local/src
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # tar -xjf openmpi-1.4.3-patched.tar.bz2
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # cd openmpi-1.4.3
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # module load compilers/intel/2011.6.233
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # ./configure &gt;../openmpi-1.4.3-configure-intel.6.233.log 2&gt;&amp;1 --with-tm --with-openib --without-valgrind --without-udapl --enable-contrib-no-build=vt --with-wrapper-ldflags=&quot;-shared-intel&quot; CC=&quot;icc&quot; CFLAGS=&quot;-g -O3&quot; CXX=&quot;icpc&quot; CXXFLAGS=&quot;-g -O3&quot; FC=&quot;ifort&quot; FCFLAGS=&quot;-g -O3&quot; F77=&quot;ifort&quot; FFLAGS=&quot;-g -O3&quot; LDFLAGS=&quot;-shared-intel&quot;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # make &gt;../openmpi-1.4.3-make-intel.6.233.log 2&gt;&amp;1
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # make check &gt;../openmpi-1.4.3-check-intel.6.233.log 2&gt;&amp;1
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; (When I generate the OpenMPI 1.4.3 library we actually use, I also add a --prefix.  But, that complicates diff's of the stdout files for these steps, so it is not used here.  Thus, I do NOT proceed to make install any of these libraries.)
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; The three earlier versions of the Intel 2011 compilers all pass the make check tests.  When I compare the ./configure stdout files, they are all identical.  However, the ./configure stdout file for the Intel 2011.6.233 compilers has one difference:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; [root_at_hydra openmpi-1.4.3]# diff ../openmpi-1.4.3-configure-intel.{5.220,6.233}.log
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 178c178
</span><br>
<span class="quotelev3">&gt;&gt;&gt; &lt; checking for __attribute__(may_alias)... no
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ---
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; checking for __attribute__(may_alias)... yes
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; That is obviously where I will start looking for the source of the problem.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Maybe someone reading this list knows what the purpose of that test is, whether the Intel 2011 compilers are expected to have this feature enabled, and whether the code this enables can cause this problem if the Intel 2011.6.233 compilers do not fully support whatever this test is intended to discern.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Larry Baker
</span><br>
<span class="quotelev2">&gt;&gt; US Geological Survey
</span><br>
<span class="quotelev2">&gt;&gt; 650-329-5608
</span><br>
<span class="quotelev2">&gt;&gt; baker_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
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
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-9798/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9799.php">Jeff Squyres: "Re: [OMPI devel] RFC: CRS Module for MTCP Checkpointing Package"</a>
<li><strong>Previous message:</strong> <a href="9797.php">Alex Brick: "Re: [OMPI devel] RFC: CRS Module for MTCP Checkpointing Package"</a>
<li><strong>In reply to:</strong> <a href="9795.php">Larry Baker: "Re: [OMPI devel] make check fails for Intel 2011.6.233 (OpenMPI 1.4.3)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9830.php">Larry Baker: "Re: [OMPI devel] make check fails for Intel 2011.6.233 (OpenMPI 1.4.3)"</a>
<li><strong>Reply:</strong> <a href="9830.php">Larry Baker: "Re: [OMPI devel] make check fails for Intel 2011.6.233 (OpenMPI 1.4.3)"</a>
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