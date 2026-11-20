<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function index()
    {
        $backupPath = storage_path('app/backups');

        if (!File::exists($backupPath)) {
            File::makeDirectory($backupPath, 0755, true);
        }

        $files = File::files($backupPath);

        return view('admin.backup.index', compact('files'));
    }

    public function backup()
    {
        $backupPath = storage_path('app/backups');

        if (!File::exists($backupPath)) {
            File::makeDirectory($backupPath, 0755, true);
        }

        $filename = 'backup_sipmas_' . now()->format('Y-m-d_H-i-s') . '.sql';

        $filePath = $backupPath . DIRECTORY_SEPARATOR . $filename;

        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $host = config('database.connections.mysql.host');
        $port = config('database.connections.mysql.port');

        $mysqldump = 'D:\\XAMPP\\mysql\\bin\\mysqldump.exe';

        $command = "\"{$mysqldump}\""
            . " --host={$host}"
            . " --port={$port}"
            . " --user={$username}";

        if (!empty($password)) {
            $command .= " --password={$password}";
        }

        $command .= " {$database} > \"{$filePath}\"";

        exec($command, $output, $result);

        if ($result !== 0 || !File::exists($filePath)) {
            return back()->with('error', 'Backup database gagal dibuat.');
        }

        return back()->with('success', 'Backup database berhasil dibuat.');
    }

    public function download($filename): BinaryFileResponse
    {
        $filePath = storage_path('app/backups/' . basename($filename));

        if (!File::exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath);
    }

    public function restore(Request $request)
{
    $request->validate([
        'backup_file' => 'required|file|mimes:sql,txt',
    ]);

    $file = $request->file('backup_file');

    $database = config('database.connections.mysql.database');
    $username = config('database.connections.mysql.username');
    $password = config('database.connections.mysql.password');
    $host = config('database.connections.mysql.host');
    $port = config('database.connections.mysql.port');

    $tempPath = $file->getRealPath();

    $mysql = 'D:\\XAMPP\\mysql\\bin\\mysql.exe';

    $command = "\"{$mysql}\""
        . " --host={$host}"
        . " --port={$port}"
        . " --user={$username}";

    if (!empty($password)) {
        $command .= " --password={$password}";
    }

    $command .= " {$database} < \"{$tempPath}\"";

    exec($command, $output, $result);

    if ($result !== 0) {
        return back()->with('error', 'Restore database gagal.');
    }

    return back()->with('success', 'Database berhasil direstore.');
}
    public function destroy($filename)
    {
        $filePath = storage_path('app/backups/' . basename($filename));

        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        return back()->with('success', 'File backup berhasil dihapus.');
    }
}