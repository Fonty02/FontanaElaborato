package com.example.fonta.piattaforma;


import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

/**
 * Created by fonta on 21/04/2021.
 */

public class Failed extends AppCompatActivity{


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.failed);


    }

    public void BackMain(View v)
    {
        Intent openFailedPage=new Intent(Failed.this,MainActivity.class);
        startActivity(openFailedPage);
    }
}
