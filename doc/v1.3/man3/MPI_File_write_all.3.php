<?php
$topdir = "../../..";
$title = "MPI_File_write_all(3) man page (version 1.3.4)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
<PRE>
<!-- Manpage converted by man2html 3.0.1 -->

</PRE>
<H2>NAME</H2><PRE>
       <B>MPI_File_write_all</B>  - Writes a file starting at the locations specified
       by individual file pointers (blocking, collective).

</PRE>
<H2>SYNTAX</H2><PRE>
       C Syntax
           #include &lt;mpi.h&gt;
           int MPI_File_write_all(MPI_File <I>fh</I>, void <I>*buf</I>,
                  int <I>count</I>, MPI_Datatype <I>datatype</I>, MPI_Status <I>*status</I>)

       Fortran Syntax
           INCLUDE 'mpif.h'
           MPI_FILE_WRITE_ALL(<I>FH</I>,  <I>BUF</I>, <I>COUNT</I>,
                   <I>DATATYPE</I>, <I>STATUS</I>,  <I>IERROR</I>)
             &lt;type&gt;        BUF(*)
             INTEGER  FH, COUNT, DATATYPE, STATUS(MPI_STATUS_SIZE),
                      IERROR

</PRE>
<H2>C++ Syntax</H2><PRE>
       #include &lt;mpi.h&gt;
       void MPI::File::Write_all(const void* <I>buf</I>, int <I>count</I>,
            const MPI::Datatype&amp; <I>datatype</I>, MPI::Status&amp; <I>status</I>)

       void MPI::File::Write_all(const void* <I>buf</I>, int <I>count</I>,
            const MPI::Datatype&amp; <I>datatype</I>)

</PRE>
<H2>INPUT PARAMETERS</H2><PRE>
       fh        File handle (handle).

       buf       Initial address of buffer (choice).

       count     Number of elements in buffer (integer).

       datatype  Data type of each buffer element (handle).

</PRE>
<H2>OUTPUT PARAMETERS</H2><PRE>
       status    Status object (status).

       IERROR    Fortran only: Error status (integer).

</PRE>
<H2>DESCRIPTION</H2><PRE>
       MPI_File_write_all is a collective routine that attempts to write  into
       the  file  associated  with  <I>fh</I> (at the current individual file pointer
       position maintained by the system) a total number of <I>count</I>  data  items
       having  <I>datatype</I>  type from the user's buffer <I>buf.</I>  The data is written
       into  those  parts  of  the  file  specified  by  the   current   view.
       MPI_File_write_all  stores  the  number  of  <I>datatype</I> elements actually
       written in <I>status.</I>  All other fields of <I>status</I> are undefined.

       It is erroneous to call this function if MPI_MODE_SEQUENTIAL  mode  was
       specified when the file was opened.

       called. For MPI I/O function errors, the default error handler  is  set
       to   MPI_ERRORS_RETURN.   The   error   handler  may  be  changed  with
       <a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>;     the     predefined      error      handler
       MPI_ERRORS_ARE_FATAL  may  be  used to make I/O errors fatal. Note that
       MPI does not guarantee that an MPI program can continue past an  error.

1.3.4                            Nov 11, 2009            <B>MPI_File_write_all(3)</B>
</PRE>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
