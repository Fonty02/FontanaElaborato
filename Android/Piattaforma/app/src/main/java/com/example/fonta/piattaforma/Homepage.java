package com.example.fonta.piattaforma;

/**
 * Created by fonta on 21/04/2021.
 */

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;


public class Homepage extends AppCompatActivity {

AvailabilityResponse av;
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.homepage);
        //av=new AvailabilityResponse();


    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {

        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        Log.i("mylog2","BEFORE");
        Log.i("mylog2",AvailabilityResponse.stato);
        Log.i("mylog2","AFTER");
        switch (item.getItemId()) {

            case R.id.certificatoItem:
                if (AvailabilityResponse.stato.equals("1")) {
                    Intent openCertificatoPage = new Intent(Homepage.this, Certificato.class);
                    startActivity(openCertificatoPage);
                } else {
                    Intent openNonCertificatoPage = new Intent(Homepage.this, nonCertificato.class);
                    startActivity(openNonCertificatoPage);
                }
                break;

            case R.id.logoutItem:
                Intent openMainPage = new Intent(Homepage.this, MainActivity.class);
                startActivity(openMainPage);
                break;

            case R.id.itemVaccini:
                Intent openVacciniPage=new Intent (Homepage.this, Vaccini.class);
                startActivity(openVacciniPage);
                break;

            case R.id.itemFakeNews:
                Intent openFakeNewsPage=new Intent (Homepage.this, FakeNews.class);
                startActivity(openFakeNewsPage);
                break;

            case R.id.itemCampagna:
                Intent openCampagnaPage=new Intent (Homepage.this, Campagna.class);
                startActivity(openCampagnaPage);
                break;

            case R.id.questionarioItem:
                Intent openQuestionarioPage=new Intent (Homepage.this, Questionario.class);
                startActivity(openQuestionarioPage);
                break;

        }

        return super.onOptionsItemSelected(item);
    }


}
