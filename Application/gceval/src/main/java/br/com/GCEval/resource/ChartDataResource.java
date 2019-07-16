package br.com.GCEval.resource;

import br.com.GCEval.chart.Chart;
import br.com.GCEval.model.Answerdata;
import br.com.GCEval.model.Useraccount;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.repository.AnswerDataRepository;
import br.com.GCEval.repository.CompanyRepository;
import br.com.GCEval.repository.QuestionRepository;
import java.util.ArrayList;
import org.apache.commons.lang3.ArrayUtils;

@RestController
@RequestMapping("/chart")
public class ChartDataResource {

    @Autowired
    private AnswerDataRepository answerDataRepository;

    @Autowired
    private CompanyResource companyResource;

    @GetMapping
    public List<Answerdata> findAll() {
        return answerDataRepository.findAll();
    }

    @GetMapping("/fromuser/{id}")
    public Chart dataFromUserId(@PathVariable Integer id) {
        Useraccount c = new Useraccount();
        c.setIdUserAccount(id);
        List<Answerdata> dataList = answerDataRepository.findByUserAccount(c);
        ArrayList<Double> yAxis = new ArrayList<>();
        ArrayList<String> xLabels = new ArrayList<>();
        for (Answerdata d : dataList) {
            double acumulator = 0;
            for (Answerdata s : d.getSection().getAnswerdataList()) {
                acumulator += s.getAnswer().getWeight();
            }
            if (!ArrayUtils.contains(xLabels.toArray(), d.getSection().getName())) {
                xLabels.add(d.getSection().getName());
                yAxis.add(acumulator);
            }
        }
        Chart t = new Chart();
        t.setxLabel(xLabels);
        t.setyAxis(yAxis);
        return t;
    }

    @GetMapping("/fromcompany/{id}")
    public Chart dataFromCompanyId(@PathVariable Integer id) {
        Useraccount c = new Useraccount();
        c.setIdUserAccount(id);
        List<Useraccount> employees = companyResource.findEmployeesByIdCompany(id);
        ArrayList<Double> yAxis = new ArrayList<>();
        ArrayList<String> xLabels = new ArrayList<>();

        for (Useraccount uc : employees) {
            List<Answerdata> dataList = answerDataRepository.findByUserAccount(uc);
            double acumulator = 0;    
            for (Answerdata d : dataList) {
                acumulator += d.getAnswer().getWeight();
            }
            xLabels.add(uc.getNome());
            yAxis.add(acumulator);
        }
        Chart t = new Chart();
        t.setxLabel(xLabels);
        t.setyAxis(yAxis);
        return t;
    }

}
