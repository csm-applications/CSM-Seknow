
package br.com.GCEval.model;

import com.fasterxml.jackson.annotation.JsonIgnore;
import java.io.Serializable;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;


@Entity
@Table(name = "section")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Section.findAll", query = "SELECT s FROM Section s"),
    @NamedQuery(name = "Section.findByIdSection", query = "SELECT s FROM Section s WHERE s.idSection = :idSection"),
    @NamedQuery(name = "Section.findByNumber", query = "SELECT s FROM Section s WHERE s.number = :number"),
    @NamedQuery(name = "Section.findByName", query = "SELECT s FROM Section s WHERE s.name = :name")})
public class Section implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "idSection")
    private Integer idSection;
    @Basic(optional = false)
    @NotNull
    @Column(name = "number")
    private int number;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 150)
    @Column(name = "name")
    private String name;
    @OneToMany(cascade = CascadeType.ALL, mappedBy = "section")
    private List<Question> questionList;
    @JoinColumn(name = "diagnostic", referencedColumnName = "idquestionnaire")
    @ManyToOne(optional = false)
    @JsonIgnore
    private Diagnostic diagnostic;
    @OneToMany(cascade = CascadeType.ALL, mappedBy = "section")
    @JsonIgnore
    private List<Answerdata> answerdataList;

    public Section() {
    }

    public Section(Integer idSection) {
        this.idSection = idSection;
    }

    public Section(Integer idSection, int number, String name) {
        this.idSection = idSection;
        this.number = number;
        this.name = name;
    }

    public Integer getIdSection() {
        return idSection;
    }

    public void setIdSection(Integer idSection) {
        this.idSection = idSection;
    }

    public int getNumber() {
        return number;
    }

    public void setNumber(int number) {
        this.number = number;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    @XmlTransient
    public List<Question> getQuestionList() {
        return questionList;
    }

    public void setQuestionList(List<Question> questionList) {
        this.questionList = questionList;
    }

    public Diagnostic getDiagnostic() {
        return diagnostic;
    }

    public void setDiagnostic(Diagnostic diagnostic) {
        this.diagnostic = diagnostic;
    }

    @XmlTransient
    public List<Answerdata> getAnswerdataList() {
        return answerdataList;
    }

    public void setAnswerdataList(List<Answerdata> answerdataList) {
        this.answerdataList = answerdataList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idSection != null ? idSection.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Section)) {
            return false;
        }
        Section other = (Section) object;
        if ((this.idSection == null && other.idSection != null) || (this.idSection != null && !this.idSection.equals(other.idSection))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "br.com.GCEval.model.Section[ idSection=" + idSection + " ]";
    }
    
}
