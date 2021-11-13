pipeline {
  agent any
  parameters {
        string(name: 'BINARY_STORE', defaultValue: '/home/binaries', trim: true)
  }
  stages {
    stage('Extract Sources') {
      steps {
	    // Use the master branch to get the sources. Ensure the media is attached into the pi.
        dir('pkg_ra_calendar_download') {
          // Checkout to the right directory
	      git(url: 'https://github.com/ramblerswebs/pkg_ra_calendar_download', branch: 'master')
		}
      }
    }
    stage('Update version information') {
      steps {
        sh 'python2 /home/UpdateJoomlaBuild -bx -i pkg_ra_calendar_download/packages/com_ra_calendar_download/com_ra_calendar_download.xml'
        sh 'python2 /home/UpdateJoomlaBuild -bx -i pkg_ra_calendar_download/packages/mod_ra_calendar_download/mod_ra_calendar_download.xml'
        sh 'python2 /home/UpdateJoomlaBuild -bx -i pkg_ra_calendar_download/pkg_ra_calendar_download.xml'
      }
    }
    stage('Package Zip File') {
      steps {
        // First tidy the directory
        sh 'rm -r packages'
        sh 'rm pkg_ra_calendar_download.xml'
        // First Zip the components as part of the package
        sh 'rm -r .git'
        dir('pkg_ra_calendar_download/packages') {
          sh 'zip -r com_ra_calendar_download.zip com_ra_calendar_download'
          sh 'zip -r mod_ra_calendar_download.zip mod_ra_calendar_download'
		      // Remove unwanted directories
		      //sh 'rm -r com_ra_calendar_download'
		      //sh 'rm -r mod_ra_calendar_download'
		    } 

		    dir('pkg_ra_calendar_download') {
          sh 'rm -r .git'
		      // Now zip the main package
          sh 'zip -r ../pkg_ra_calendar_download.zip .'
        }
      }
    }

    stage('Repository Store') {
    	steps {
    	  script {
    	      dir('tmp'){
    	        sh 'rm -f *.zip'
    	      }
          }
          sh 'python2 /home/UpdateJoomlaBuild -bx -i pkg_ra_calendar_download/pkg_ra_calendar_download.xml -z tmp' 
          fileOperations([fileCopyOperation(excludes: '', flattenFiles: true, includes: 'tmp/*.zip', targetLocation: params.BINARY_STORE)])
    	}
    }
  } // End of Stages
  post {
  	always {
  	    echo "Completed"
  	}
  	success {
  		echo "Completed Succcessfully"
  		cleanWs()
  	}
  	failure {
  	    echo "Completed with Failure"
  	}
  	unstable {
  	    echo "Unstable Build"
  	}
  	changed {
  	    echo "Compeleted with Changes"
  	}
  } // End of Post
} // End of Pipeline
