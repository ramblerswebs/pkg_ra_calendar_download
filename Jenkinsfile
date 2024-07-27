pipeline {
  agent any
  parameters {
        string(name: 'BINARY_STORE', defaultValue: '/Binaries', trim: true)
  }
  stages {
    stage('Update version information') {
      steps {
            sh 'python3 /home/UpdateJoomlaBuild -bx -i packages/com_ra_calendar_download/com_ra_calendar_download.xml'
            sh 'python3 /home/UpdateJoomlaBuild -bx -i packages/mod_ra_calendar_download/mod_ra_calendar_download.xml'
            sh 'python3 /home/UpdateJoomlaBuild -bx -i pkg_ra_calendar_download.xml'
      }
    }
    stage('Package Zip File') {
      steps {
        dir('packages') {
          // Zip each component and remove the directory.
          sh 'zip -r com_ra_calendar_download.zip com_ra_calendar_download'
		      sh 'rm -r com_ra_calendar_download'
          sh 'zip -r mod_ra_calendar_download.zip mod_ra_calendar_download'
		      sh 'rm -r mod_ra_calendar_download'
		    } 

        // Remove the Jenkins File
        sh 'rm -f Jenkinsfile'
        // Remove the temp location
        sh 'rm -rf package@tmp'
        // Now zip the main package
        sh 'zip -r pkg_ra_calendar_download.zip .'
      }
    }

    stage('Repository Store') {
    	steps {
    	  script {
    	      dir('output'){
    	        sh 'rm -f *.zip'
    	      }
          }
          sh 'python3 /home/UpdateJoomlaBuild -bx -i pkg_ra_calendar_download.xml -z output' 
          fileOperations([fileCopyOperation(excludes: '', flattenFiles: true, includes: 'output/*.zip', targetLocation: params.BINARY_STORE)])
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
