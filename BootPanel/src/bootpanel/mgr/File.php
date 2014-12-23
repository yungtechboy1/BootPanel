<?php
	class File {
		public function delete($file) {
			if(is_dir($file)) {
				$files = glob($file. '*', GLOB_MARK);
				foreach($files as $file) {
					BootPanel::getFileManager()->delete($file);
				}
				rmdir($file);
			} elseif(is_file($file))
				unlink($file);
		}
	}