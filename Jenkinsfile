pipeline {
  agent any
  stages {
    stage('Extract Sources') {
      steps {
	    // Use the master branch to get the sources. Ensure the media is attached into the pi.
        dir('pkg_ra_calendar_download') {
	      git(url: '/media/pi/USBPI/GitLibrary/pkg_ra_calendar_download', branch: 'master')
		}
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
		  sh 'rm -r com_ra_calendar_download'
		  sh 'rm -r mod_ra_calendar_download'
		}

		dir('pkg_ra_calendar_download') {
		  // Now zip the main package
          sh 'zip -r ../pkg_ra_calendar_download.zip .'
        }
        
        // Now remove the directory
        // sh 'rm -r pkg_ra_calendar_download'
      }
    }
/*
    stage('Deployment') {
      parallel {
        stage('Apache01') {
          steps {
            script {
              // Update to use SSH Private-Public Key file
              withCredentials([sshUserPrivateKey(credentialsId: 'SSH_Pi', keyFileVariable: 'KEY', passphraseVariable: 'PHRASE', usernameVariable: 'USER')]) {
                // Define the remote node
                def remote = [:]
                remote.name = 'PiMobile4'
                remote.host = '172.16.1.1'
                remote.user = "$USER"
                remote.identityFile = "/home/jenkins/.ssh/pi"
                remote.passphrase = "$PHRASE"
                remote.allowAnyHosts = true
		        
                // First set the permissions so that the file can be deployed
                sshCommand(remote: remote, command: "/home/pi/bin/apache_perm apache01 edit")
                // put the package into the remote tmp location
                sshPut (remote: remote, from: "pkg_ra_calendar_download.zip", into: "/home/pi/Documents/Docker/ramblers/volumes/apache01/tmp")
                // reset the permissions back
                sshCommand(remote: remote, command: "/home/pi/bin/apache_perm apache01 reset")

                // run the command to install the update.
                sshCommand(remote: remote, command: "docker exec apache01 php cli/install-joomla-extension.php --package=tmp/pkg_ra_calendar_download.zip")
        	  } // End of withCredentials
            } // End of Script
          } // End of Steps
        } // End of Stage

        stage('Trial Site') {
          steps {
            script {
	            timeout(time: 1, unit: 'MINUTES') {
	              input(id: "DeployGate2", message: "Deploy to Trial Site?", ok: "Deploy")
              }
            }
            
            script {
              echo "Installing on Trial Site"
              // Transfer the file using FTP
 			  ftpPublisher continueOnError: false, failOnError: true, publishers: [
        		[configName: 'FTP_Trial', transfers: [
            		[asciiMode: false, sourceFiles: 'pkg_ra_calendar_download.zip']
                    ], usePromotionTimestamp: false, useWorkspaceInPromotion: false, verbose: true]]

              // Now execute the update
              withCredentials([sshUserPrivateKey(credentialsId: 'SSH_Trial', keyFileVariable: 'KEY', passphraseVariable: 'PHRASE', usernameVariable: 'USER')]) {
                // Define the remote node
                def remote = [:]
                remote.name = 'Trial Site'
                remote.host = 'ssh.stackcp.com'
                remote.user = "$USER"
                remote.identityFile = "/home/jenkins/.ssh/trial"
                remote.passphrase = "$PHRASE"
                remote.allowAnyHosts = true
		        
                // run the command to install the update.
                sshCommand(remote: remote, command: "php public_html/trial/cli/install-joomla-extension.php --package=public_html/trial/tmp/pkg_ra_calendar_download.zip")
        	  } // End of withCredentials
            }
          } // End of Steps
        } // End of Stage
      } // End of Parallel
    } // End of Stage
*/
  } // End of Stages
} // End of Pipeline
