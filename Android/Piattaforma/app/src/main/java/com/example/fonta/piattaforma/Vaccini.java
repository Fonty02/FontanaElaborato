package com.example.fonta.piattaforma;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.widget.TextView;

/**
 * Created by fonta on 28/04/2021.
 */

public class Vaccini extends AppCompatActivity {

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {

        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.menu, menu);

        return true;
    }


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.vaccini);


    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.itemHome:
                Intent openHomePage = new Intent(Vaccini.this, Homepage.class);
                startActivity(openHomePage);
                break;

            case R.id.certificatoItem:
                if (AvailabilityResponse.stato.equals("1")) {
                    Intent openCertificatoPage = new Intent(Vaccini.this, Certificato.class);
                    startActivity(openCertificatoPage);
                } else {
                    Intent openNonCertificatoPage = new Intent(Vaccini.this, nonCertificato.class);
                    startActivity(openNonCertificatoPage);
                }
                break;

            case R.id.logoutItem:
                Intent openMainPage = new Intent(Vaccini.this, MainActivity.class);
                startActivity(openMainPage);
                break;


            case R.id.itemFakeNews:
                Intent openFakeNewsPage=new Intent (Vaccini.this, FakeNews.class);
                startActivity(openFakeNewsPage);
                break;

            case R.id.itemCampagna:
                Intent openCampagnaPage=new Intent (Vaccini.this, Campagna.class);
                startActivity(openCampagnaPage);
                break;

            case R.id.questionarioItem:
                Intent openQuestionarioPage=new Intent (Vaccini.this, Questionario.class);
                startActivity(openQuestionarioPage);
                break;

        }
        return super.onOptionsItemSelected(item);
    }

}
