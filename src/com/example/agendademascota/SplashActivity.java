package com.example.agendademascota;

import com.example.agendademascota.util.SystemUiHider;

import android.app.Activity;
import android.content.Intent;
import android.content.pm.ActivityInfo;

import android.os.Bundle;
import android.view.Window;


/**
 * An example full-screen activity that shows and hides the system UI (i.e.
 * status bar and navigation/system bar) with user interaction.
 *
 * @see SystemUiHider
 */
public class SplashActivity extends Activity {
	protected boolean active = true;
	 protected int splashTime = 1000;
	  
	    @Override
	    public void onCreate(Bundle savedInstanceState) {
	        super.onCreate(savedInstanceState);
	        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);
	        requestWindowFeature(Window.FEATURE_NO_TITLE);
	        setContentView(R.layout.activity_splash);
	        
	        Thread splashThread = new Thread(){
	         @Override
	         public void run(){
	          try{
	           int waited = 0;
	           while(active && (waited < splashTime)){
	            sleep(100);
	            if(active){
	             waited += 100;
	            }
	            
	           }
	          } catch(InterruptedException e){
	           
	          } finally{
	           openApp();
	           stop();
	          }
	          
	         }
	        };
	        splashThread.start();
	    }
	    
	    private void openApp(){
	     finish();
	        startActivity(new Intent(this,LoginActivity.class));
	    }
	 
	}
