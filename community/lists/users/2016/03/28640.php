<?
$subject_val = "Re: [OMPI users] openmpi bug on mac os 10.11.3 ?";
include("../../include/msg-header.inc");
?>
<!-- received="Sat Mar  5 10:54:04 2016" -->
<!-- isoreceived="20160305155404" -->
<!-- sent="Sat, 5 Mar 2016 15:54:01 +0000" -->
<!-- isosent="20160305155401" -->
<!-- name="Jeff Squyres (jsquyres)" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI users] openmpi bug on mac os 10.11.3 ?" -->
<!-- id="31F8F2C2-5415-4295-9A43-162A3905A26B_at_cisco.com" -->
<!-- charset="utf-8" -->
<!-- inreplyto="190BFC51-6A3B-4E14-A39F-0798B9592241_at_kabelbw.de" -->
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
<strong>Subject:</strong> Re: [OMPI users] openmpi bug on mac os 10.11.3 ?<br>
<strong>From:</strong> Jeff Squyres (jsquyres) (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2016-03-05 10:54:01
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="28641.php">Jeff Squyres (jsquyres): "Re: [OMPI users] General Questions"</a>
<li><strong>Previous message:</strong> <a href="28639.php">Matthew Larkin: "Re: [OMPI users] General Questions"</a>
<li><strong>In reply to:</strong> <a href="28638.php">Hans-J&#195;&#188;rgen Greif: "[OMPI users] openmpi bug on mac os 10.11.3 ?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="28642.php">Hans-Jürgen Greif: "Re: [OMPI users] openmpi bug on mac os 10.11.3 ?"</a>
<li><strong>Reply:</strong> <a href="28642.php">Hans-Jürgen Greif: "Re: [OMPI users] openmpi bug on mac os 10.11.3 ?"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
What version of Open MPI are you using?
<br>

<br>
Can you send all the information listed here:
<br>

<br>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.open-mpi.org/community/help/">https://www.open-mpi.org/community/help/</a>
<br>

<br>

<br>
<span class="quotelev1">&gt; On Mar 5, 2016, at 5:35 AM, Hans-J&#195;&#188;rgen Greif &lt;hans_juergen.greif_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Hello,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; on mac os 10.11.3 I have found an error:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; mpirun -np 2 valgrind ./second
</span><br>
<span class="quotelev1">&gt; ==612== Memcheck, a memory error detector
</span><br>
<span class="quotelev1">&gt; ==612== Copyright (C) 2002-2015, and GNU GPL'd, by Julian Seward et al.
</span><br>
<span class="quotelev1">&gt; ==612== Using Valgrind-3.11.0 and LibVEX; rerun with -h for copyright info
</span><br>
<span class="quotelev1">&gt; ==612== Command: ./second
</span><br>
<span class="quotelev1">&gt; ==612== 
</span><br>
<span class="quotelev1">&gt; ==611== Memcheck, a memory error detector
</span><br>
<span class="quotelev1">&gt; ==611== Copyright (C) 2002-2015, and GNU GPL'd, by Julian Seward et al.
</span><br>
<span class="quotelev1">&gt; ==611== Using Valgrind-3.11.0 and LibVEX; rerun with -h for copyright info
</span><br>
<span class="quotelev1">&gt; ==611== Command: ./second
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; --612-- UNKNOWN mach_msg unhandled MACH_SEND_TRAILER option
</span><br>
<span class="quotelev1">&gt; --611-- UNKNOWN mach_msg unhandled MACH_SEND_TRAILER option
</span><br>
<span class="quotelev1">&gt; --612-- UNKNOWN mach_msg unhandled MACH_SEND_TRAILER option (repeated 2 times)
</span><br>
<span class="quotelev1">&gt; --611-- UNKNOWN mach_msg unhandled MACH_SEND_TRAILER option (repeated 2 times)
</span><br>
<span class="quotelev1">&gt; --611-- UNKNOWN mach_msg unhandled MACH_SEND_TRAILER option (repeated 4 times)
</span><br>
<span class="quotelev1">&gt; --612-- UNKNOWN mach_msg unhandled MACH_SEND_TRAILER option (repeated 4 times)
</span><br>
<span class="quotelev1">&gt; --611-- UNKNOWN mach_msg unhandled MACH_SEND_TRAILER option (repeated 8 times)
</span><br>
<span class="quotelev1">&gt; --612-- UNKNOWN mach_msg unhandled MACH_SEND_TRAILER option (repeated 8 times)
</span><br>
<span class="quotelev1">&gt; ==612== Conditional jump or move depends on uninitialised value(s)
</span><br>
<span class="quotelev1">&gt; ==611== Conditional jump or move depends on uninitialised value(s)
</span><br>
<span class="quotelev1">&gt; ==611==    at 0x100000BED: main (second.c:39)
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; ==612==    at 0x100000D1C: main (second.c:60)
</span><br>
<span class="quotelev1">&gt; ==612== 
</span><br>
<span class="quotelev1">&gt; ==611== Conditional jump or move depends on uninitialised value(s)
</span><br>
<span class="quotelev1">&gt; ==611==    at 0x100060781: MPI_Win_post (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100000C69: main (second.c:43)
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; ==611== Conditional jump or move depends on uninitialised value(s)
</span><br>
<span class="quotelev1">&gt; ==611==    at 0x100413E98: __ultoa (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10041136C: __vfprintf (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1004396C8: __v2printf (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10040EF51: _vasprintf (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1001C379E: opal_show_help_vstring (in /usr/local/openmpi/lib/libopen-pal.13.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100128231: orte_show_help (in /usr/local/openmpi/lib/libopen-rte.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10002069E: backend_fatal (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1000203EC: ompi_mpi_errors_are_fatal_comm_handler (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1000201BD: ompi_errhandler_invoke (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100000C69: main (second.c:43)
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; ==611== Conditional jump or move depends on uninitialised value(s)
</span><br>
<span class="quotelev1">&gt; ==611==    at 0x100413F06: __ultoa (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10041136C: __vfprintf (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1004396C8: __v2printf (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10040EF51: _vasprintf (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1001C379E: opal_show_help_vstring (in /usr/local/openmpi/lib/libopen-pal.13.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100128231: orte_show_help (in /usr/local/openmpi/lib/libopen-rte.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10002069E: backend_fatal (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1000203EC: ompi_mpi_errors_are_fatal_comm_handler (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1000201BD: ompi_errhandler_invoke (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100000C69: main (second.c:43)
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; ==611== Conditional jump or move depends on uninitialised value(s)
</span><br>
<span class="quotelev1">&gt; ==611==    at 0x100413F71: __ultoa (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10041136C: __vfprintf (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1004396C8: __v2printf (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10040EF51: _vasprintf (in /usr/lib/system/libsystem_c.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1001C379E: opal_show_help_vstring (in /usr/local/openmpi/lib/libopen-pal.13.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100128231: orte_show_help (in /usr/local/openmpi/lib/libopen-rte.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10002069E: backend_fatal (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1000203EC: ompi_mpi_errors_are_fatal_comm_handler (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1000201BD: ompi_errhandler_invoke (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100000C69: main (second.c:43)
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; ==611== Conditional jump or move depends on uninitialised value(s)
</span><br>
<span class="quotelev1">&gt; ==611==    at 0x10000B359: strlen (vg_replace_strmem.c:470)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10019922D: opal_dss_pack_string (in /usr/local/openmpi/lib/libopen-pal.13.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100198CFD: opal_dss_pack (in /usr/local/openmpi/lib/libopen-pal.13.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100128633: orte_show_help_norender (in /usr/local/openmpi/lib/libopen-rte.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100128249: orte_show_help (in /usr/local/openmpi/lib/libopen-rte.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10002069E: backend_fatal (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1000203EC: ompi_mpi_errors_are_fatal_comm_handler (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1000201BD: ompi_errhandler_invoke (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100000C69: main (second.c:43)
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; ==611== Thread 2:
</span><br>
<span class="quotelev1">&gt; ==611== Syscall param write(buf) points to uninitialised byte(s)
</span><br>
<span class="quotelev1">&gt; ==611==    at 0x10051C9FE: write (in /usr/lib/system/libsystem_kernel.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1012C9926: send_bytes (in /usr/local/openmpi/lib/openmpi/mca_oob_tcp.so)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1012C916F: mca_oob_tcp_send_handler (in /usr/local/openmpi/lib/openmpi/mca_oob_tcp.so)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1001CDC10: opal_libevent2021_event_base_loop (in /usr/local/openmpi/lib/libopen-pal.13.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10013BC6C: orte_progress_thread_engine (in /usr/local/openmpi/lib/libopen-rte.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10066CC12: _pthread_body (in /usr/lib/system/libsystem_pthread.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10066CB8F: _pthread_start (in /usr/lib/system/libsystem_pthread.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10066A374: thread_start (in /usr/lib/system/libsystem_pthread.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==  Address 0x101c7f7cd is 157 bytes inside a block of size 512 alloc'd
</span><br>
<span class="quotelev1">&gt; ==611==    at 0x100009D5A: realloc (vg_replace_malloc.c:789)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100197E32: opal_dss_buffer_extend (in /usr/local/openmpi/lib/libopen-pal.13.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10019926B: opal_dss_pack_string (in /usr/local/openmpi/lib/libopen-pal.13.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100198CFD: opal_dss_pack (in /usr/local/openmpi/lib/libopen-pal.13.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100128633: orte_show_help_norender (in /usr/local/openmpi/lib/libopen-rte.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100128249: orte_show_help (in /usr/local/openmpi/lib/libopen-rte.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x10002069E: backend_fatal (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1000203EC: ompi_mpi_errors_are_fatal_comm_handler (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x1000201BD: ompi_errhandler_invoke (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==611==    by 0x100000C69: main (second.c:43)
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; [alpha:611] *** An error occurred in MPI_Win_post
</span><br>
<span class="quotelev1">&gt; [alpha:611] *** reported by process [122543980675073,1095216660480]
</span><br>
<span class="quotelev1">&gt; [alpha:611] *** on communicator MPI_COMM_WORLD
</span><br>
<span class="quotelev1">&gt; [alpha:611] *** MPI_ERR_WIN: invalid window
</span><br>
<span class="quotelev1">&gt; [alpha:611] *** MPI_ERRORS_ARE_FATAL (processes in this communicator will now abort,
</span><br>
<span class="quotelev1">&gt; [alpha:611] ***    and potentially your MPI job)
</span><br>
<span class="quotelev1">&gt; --611:0:schedule VG_(sema_down): read returned -4
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; ==611== HEAP SUMMARY:
</span><br>
<span class="quotelev1">&gt; ==611==     in use at exit: 2,644,595 bytes in 7,919 blocks
</span><br>
<span class="quotelev1">&gt; ==611==   total heap usage: 13,035 allocs, 5,116 frees, 3,399,345 bytes allocated
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; ==611== LEAK SUMMARY:
</span><br>
<span class="quotelev1">&gt; ==611==    definitely lost: 680 bytes in 16 blocks
</span><br>
<span class="quotelev1">&gt; ==611==    indirectly lost: 24 bytes in 1 blocks
</span><br>
<span class="quotelev1">&gt; ==611==      possibly lost: 0 bytes in 0 blocks
</span><br>
<span class="quotelev1">&gt; ==611==    still reachable: 2,621,733 bytes in 7,710 blocks
</span><br>
<span class="quotelev1">&gt; ==611==         suppressed: 22,158 bytes in 192 blocks
</span><br>
<span class="quotelev1">&gt; ==611== Rerun with --leak-check=full to see details of leaked memory
</span><br>
<span class="quotelev1">&gt; ==611== 
</span><br>
<span class="quotelev1">&gt; ==611== For counts of detected and suppressed errors, rerun with: -v
</span><br>
<span class="quotelev1">&gt; ==611== Use --track-origins=yes to see where uninitialised values come from
</span><br>
<span class="quotelev1">&gt; ==611== ERROR SUMMARY: 75 errors from 7 contexts (suppressed: 0 from 0)
</span><br>
<span class="quotelev1">&gt; ==612== 
</span><br>
<span class="quotelev1">&gt; ==612== Process terminating with default action of signal 15 (SIGTERM)
</span><br>
<span class="quotelev1">&gt; ==612==    at 0x10002E490: ompi_request_default_wait_all (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==612==    by 0x101446397: ompi_coll_tuned_allreduce_intra_recursivedoubling (in /usr/local/openmpi/lib/openmpi/mca_coll_tuned.so)
</span><br>
<span class="quotelev1">&gt; ==612==    by 0x10001CA18: ompi_comm_allreduce_intra (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==612==    by 0x10001C829: ompi_comm_nextcid (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==612==    by 0x10001B55E: ompi_comm_dup_with_info (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==612==    by 0x10140B8B1: component_select (in /usr/local/openmpi/lib/openmpi/mca_osc_pt2pt.so)
</span><br>
<span class="quotelev1">&gt; ==612==    by 0x100032FE5: ompi_win_create (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==612==    by 0x10005F1FF: MPI_Win_create (in /usr/local/openmpi/lib/libmpi.12.dylib)
</span><br>
<span class="quotelev1">&gt; ==612==    by 0x100000D75: main (second.c:62)
</span><br>
<span class="quotelev1">&gt; ==612== 
</span><br>
<span class="quotelev1">&gt; ==612== HEAP SUMMARY:
</span><br>
<span class="quotelev1">&gt; ==612==     in use at exit: 2,589,509 bytes in 7,918 blocks
</span><br>
<span class="quotelev1">&gt; ==612==   total heap usage: 12,962 allocs, 5,044 frees, 3,252,656 bytes allocated
</span><br>
<span class="quotelev1">&gt; ==612== 
</span><br>
<span class="quotelev1">&gt; ==612== LEAK SUMMARY:
</span><br>
<span class="quotelev1">&gt; ==612==    definitely lost: 210,011 bytes in 92 blocks
</span><br>
<span class="quotelev1">&gt; ==612==    indirectly lost: 279,210 bytes in 6,023 blocks
</span><br>
<span class="quotelev1">&gt; ==612==      possibly lost: 53,392 bytes in 9 blocks
</span><br>
<span class="quotelev1">&gt; ==612==    still reachable: 2,024,738 bytes in 1,602 blocks
</span><br>
<span class="quotelev1">&gt; ==612==         suppressed: 22,158 bytes in 192 blocks
</span><br>
<span class="quotelev1">&gt; ==612== Rerun with --leak-check=full to see details of leaked memory
</span><br>
<span class="quotelev1">&gt; ==612== 
</span><br>
<span class="quotelev1">&gt; ==612== For counts of detected and suppressed errors, rerun with: -v
</span><br>
<span class="quotelev1">&gt; ==612== Use --track-origins=yes to see where uninitialised values come from
</span><br>
<span class="quotelev1">&gt; ==612== ERROR SUMMARY: 14 errors from 1 contexts (suppressed: 0 from 0)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; The program second.c runs well on opensuse 13.3.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; &lt;second.c&gt;
</span><br>
<span class="quotelev1">&gt;  
</span><br>
<span class="quotelev1">&gt; Hans-J&#195;&#188;rgen Greif
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; hans_juergen.greif_at_[hidden]
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
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2016/03/28638.php">http://www.open-mpi.org/community/lists/users/2016/03/28638.php</a>
</span><br>

<br>

<br>
-- 
<br>
Jeff Squyres
<br>
jsquyres_at_[hidden]
<br>
For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
<br>

<br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="28641.php">Jeff Squyres (jsquyres): "Re: [OMPI users] General Questions"</a>
<li><strong>Previous message:</strong> <a href="28639.php">Matthew Larkin: "Re: [OMPI users] General Questions"</a>
<li><strong>In reply to:</strong> <a href="28638.php">Hans-J&#195;&#188;rgen Greif: "[OMPI users] openmpi bug on mac os 10.11.3 ?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="28642.php">Hans-Jürgen Greif: "Re: [OMPI users] openmpi bug on mac os 10.11.3 ?"</a>
<li><strong>Reply:</strong> <a href="28642.php">Hans-Jürgen Greif: "Re: [OMPI users] openmpi bug on mac os 10.11.3 ?"</a>
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
