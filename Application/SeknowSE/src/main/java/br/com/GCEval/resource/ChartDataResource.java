package br.com.GCEval.resource;

import br.com.GCEval.chart.Chart;
import br.com.GCEval.chart.PieChart;
import br.com.GCEval.model.Answerdata;
import br.com.GCEval.model.Company;
import br.com.GCEval.model.Useraccount;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.repository.AnswerDataRepository;
import java.util.ArrayList;
import java.util.Optional;
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
                if (s.getAnswer() != null) {
                    acumulator += s.getAnswer().getWeight();
                }
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
                if (d.getAnswer() != null && d.getAnswer().getWeight() != null) {
                    acumulator += d.getAnswer().getWeight();
                }
            }
            xLabels.add(uc.getNome());
            yAxis.add(acumulator);
        }
        Chart t = new Chart();
        t.setxLabel(xLabels);
        t.setyAxis(yAxis);
        return t;
    }

    @GetMapping("/fromcompany/{id}/gender")
    public PieChart genderFromCompany(@PathVariable Integer id){
        Optional<Company> company = companyResource.findById(id);
        if(company.isPresent()){
            List<Useraccount> lstEmployees = company.get().getEmployees();
            double numberOfWoman = 0;
            double numberOfMan = 0;
            for (Useraccount c : lstEmployees ) {
                if("Male".equals(c.getGender())){
                    numberOfMan++;
                }
                if ("Female".equals(c.getGender())){
                    numberOfWoman++;
                }
            }
            PieChart chart= new PieChart();
            List<Double> values = new ArrayList<>();
            values.add(numberOfMan);
            values.add(numberOfWoman);
            
            List<String> labels = new ArrayList<>();
            labels.add("Male");
            labels.add("Female");

            chart.setLabels(labels);
            chart.setValues(values);
            
            return chart;
        }
        System.out.println("entrei");
        return null;
    }
    
}
