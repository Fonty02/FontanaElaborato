package com.example.fonta.piattaforma;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;

/**
 * Created by fonta on 28/04/2021.
 */

public class FakeNews extends AppCompatActivity {




    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.fakenews);



    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {

        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.itemHome:
                Intent openHomePage = new Intent(FakeNews.this, Homepage.class);
                startActivity(openHomePage);
                break;

            case R.id.certificatoItem:
                if (AvailabilityResponse.stato.equals("1")) {
                    Intent openCertificatoPage = new Intent(FakeNews.this, Certificato.class);
                    startActivity(openCertificatoPage);
                } else {
                    Intent openNonCertificatoPage = new Intent(FakeNews.this, nonCertificato.class);
                    startActivity(openNonCertificatoPage);
                }
                break;

            case R.id.logoutItem:
                Intent openMainPage = new Intent(FakeNews.this, MainActivity.class);
                startActivity(openMainPage);
                break;

            case R.id.itemVaccini:
                Intent openVacciniPage=new Intent (FakeNews.this, Vaccini.class);
                startActivity(openVacciniPage);
                break;


            case R.id.itemCampagna:
                Intent openCampagnaPage=new Intent (FakeNews.this, Campagna.class);
                startActivity(openCampagnaPage);
                break;

            case R.id.questionarioItem:
                Intent openQuestionarioPage=new Intent (FakeNews.this, Questionario.class);
                startActivity(openQuestionarioPage);
                break;

        }
        return super.onOptionsItemSelected(item);
    }

}
