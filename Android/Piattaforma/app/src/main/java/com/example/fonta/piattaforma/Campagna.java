package com.example.fonta.piattaforma;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.method.LinkMovementMethod;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.widget.TextView;

/**
 * Created by fonta on 28/04/2021.
 */

public class Campagna extends AppCompatActivity {

TextView reportVaccini;


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.campagna);
        reportVaccini=(TextView) findViewById(R.id.linkTextView);
        reportVaccini.setMovementMethod(LinkMovementMethod.getInstance());

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
                Intent openHomePage = new Intent(Campagna.this, Homepage.class);
                startActivity(openHomePage);
                break;

            case R.id.certificatoItem:
                if (AvailabilityResponse.stato.equals("1")) {
                    Intent openCertificatoPage = new Intent(Campagna.this, Certificato.class);
                    startActivity(openCertificatoPage);
                } else {
                    Intent openNonCertificatoPage = new Intent(Campagna.this, nonCertificato.class);
                    startActivity(openNonCertificatoPage);
                }
                break;

            case R.id.logoutItem:
                Intent openMainPage = new Intent(Campagna.this, MainActivity.class);
                startActivity(openMainPage);
                break;

            case R.id.itemVaccini:
                Intent openVacciniPage=new Intent (Campagna.this, Vaccini.class);

                startActivity(openVacciniPage);
                break;

            case R.id.itemFakeNews:
                Intent openFakeNewsPage=new Intent (Campagna.this, FakeNews.class);

                startActivity(openFakeNewsPage);
                break;

            case R.id.questionarioItem:
                Intent openQuestionarioPage=new Intent (Campagna.this, Questionario.class);
;
                startActivity(openQuestionarioPage);
                break;
        }
        return super.onOptionsItemSelected(item);
    }

}
